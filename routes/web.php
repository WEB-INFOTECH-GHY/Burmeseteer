<?php

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* ---------------------------- Home: today's result ---------------------------- */
Route::get('/', function () {
    $now  = now();
    $game = Game::forDate($now)->first();

    // Reveal time shown in the header: today's real time, or the default if not generated yet
    $frAt = $game?->fr_reveal_at ?? Carbon::parse($now->toDateString() . ' ' . config('teer.fr_time', '16:00'));
    $srAt = $game?->sr_reveal_at ?? Carbon::parse($now->toDateString() . ' ' . config('teer.sr_time', '17:00'));

    return response()->view('web.index', [
        'date'        => $now->format('d-m-Y'),
        'fr'          => $game?->public_fr,   // null until revealed
        'sr'          => $game?->public_sr,   // null until revealed
        'frLabel'     => $frAt->format('g:iA'),
        'srLabel'     => $srAt->format('g:iA'),
        'hasGame'     => (bool) $game,
        'serverNow'   => $now->getTimestamp() * 1000,
        'frPendingAt' => ($game && ! $game->isFrRevealed()) ? $frAt->getTimestamp() * 1000 : null,
        'srPendingAt' => ($game && ! $game->isSrRevealed()) ? $srAt->getTimestamp() * 1000 : null,
    ])->header('Cache-Control', 'no-store, max-age=0');
});

/* ---------------------------- Previous results ---------------------------- */
Route::get('/previous-result', function (Request $request) {
    $request->validate([
        'month' => ['nullable', 'integer', 'between:1,12'],
        'year'  => ['nullable', 'integer', 'between:2000,2100'],
    ]);

    $month = $request->integer('month') ?: null;
    $year  = $request->integer('year') ?: null;

    $query = Game::query()->whereDate('game_date', '<=', today()); // never future dates

    if ($month || $year) {
        $year ??= now()->year;
        $query->whereYear('game_date', $year);
        if ($month) {
            $query->whereMonth('game_date', $month);
        }
    } else {
        // Default: current month + past 2 months
        $query->whereDate('game_date', '>=', now()->subMonthsNoOverflow(2)->startOfMonth());
    }

    // Only the public (reveal-safe) values are passed to the view, never the raw numbers
    $results = $query->orderByDesc('game_date')->get()
        ->groupBy(fn ($g) => $g->game_date->format('Y-m'))
        ->map(fn ($games) => [
            'label' => strtoupper($games->first()->game_date->format('F, Y')),
            'rows'  => $games->map(fn ($g) => [
                'city' => 'BURMESE',
                'date' => $g->game_date->format('Y-m-d'),
                'fr'   => $g->public_fr ?? '--',
                'sr'   => $g->public_sr ?? '--',
            ])->all(),
        ])->values()->all();

    $years = Game::selectRaw('YEAR(game_date) as y')->distinct()->pluck('y')
        ->push(now()->year)->unique()->sortDesc()->values();

    return response()->view('web.previous-result', compact('results', 'month', 'year', 'years'))
        ->header('Cache-Control', 'no-store, max-age=0');
});

require __DIR__ . '/admin.php';
