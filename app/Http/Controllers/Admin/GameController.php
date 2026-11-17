<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /** Generate today's game (only once per date). */
    public function generate(Request $request)
    {
        $data = $request->validate([
            'fr_time' => ['nullable', 'date_format:H:i'],
            'sr_time' => ['nullable', 'date_format:H:i'],
        ]);

        $today  = now()->toDateString();
        $frTime = $data['fr_time'] ?? config('teer.fr_time', '16:00');
        $srTime = $data['sr_time'] ?? config('teer.sr_time', '17:00');

        if (Game::forDate($today)->exists()) {
            return back()->with('error', "Today's game is already generated. You can only edit the numbers.");
        }

        if ($error = $this->pastTimeError(['F/R' => $frTime, 'S/R' => $srTime], $today)) {
            return back()->withInput()->with('error', $error);
        }

        Game::generateForDate($today, $frTime, $srTime);

        return back()->with('message', "Today's game generated successfully.");
    }

    /** Edit F/R and/or S/R number (modal). Revealed rounds are locked. */
    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'fr_number' => ['nullable', 'integer', 'between:1,99'],
            'sr_number' => ['nullable', 'integer', 'between:1,99'],
        ]);

        $changes = [];

        foreach (['fr', 'sr'] as $round) {
            $key = "{$round}_number";

            if (! $request->filled($key)) {
                continue; // left empty, keep the old number
            }

            if (! $game->canEdit($round)) {
                return back()->with('error', strtoupper($round) . ' is already revealed and can no longer be changed.');
            }

            if ((int) $data[$key] !== $game->{$key}) {
                $changes[$key] = (int) $data[$key];
            }
        }

        if (! $changes) {
            return back()->with('error', 'No changes to update.');
        }

        try {
            $game->update($changes);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('message', 'Number updated successfully.');
    }

    /** Reveal times must still be in the future. */
    private function pastTimeError(array $times, string $date): ?string
    {
        foreach ($times as $label => $time) {
            if (Carbon::parse("$date $time")->lte(now())) {
                return "$label time has already passed. Choose a later time.";
            }
        }

        return null;
    }



    public function index(Request $request)
{
    $request->validate([
        'month' => ['nullable', 'integer', 'between:1,12'],
        'year'  => ['nullable', 'integer', 'between:2000,2100'],
    ]);

    $month = $request->integer('month') ?: null;
    $year  = $request->integer('year') ?: null;

    $query = Game::query();

    if ($month || $year) {
        // Filter chosen: a month, or a whole year if only the year is picked
        $year ??= now()->year;
        $query->whereYear('game_date', $year);

        if ($month) {
            $query->whereMonth('game_date', $month);
            $rangeLabel = Carbon::create($year, $month, 1)->format('F Y');
        } else {
            $rangeLabel = "All of {$year}";
        }
    } else {
        // Default: current month + past 2 months
        $from = now()->subMonthsNoOverflow(2)->startOfMonth();
        $to   = now()->endOfMonth();

        $query->whereBetween('game_date', [$from->toDateString(), $to->toDateString()]);
        $rangeLabel = $from->format('M Y') . ' to ' . $to->format('M Y');
    }

    $games = $query->orderByDesc('game_date')->get(); // latest date on top

    // Years in the dropdown: every year that has games, plus the current year
    $years = Game::selectRaw('YEAR(game_date) as y')->distinct()->pluck('y')
        ->push(now()->year)->unique()->sortDesc()->values();

    return view('admin.games', compact('games', 'month', 'year', 'years', 'rangeLabel'));
}



}
