<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property Carbon      $game_date
 * @property int         $fr_number
 * @property Carbon      $fr_reveal_at
 * @property int         $sr_number
 * @property Carbon      $sr_reveal_at
 * @property string|null $public_fr   Padded number, or null until revealed
 * @property string|null $public_sr   Padded number, or null until revealed
 */
class Game extends Model
{
    public const MIN_NUMBER = 1;
    public const MAX_NUMBER = 99;

    protected $fillable = [
        'game_date',
        'fr_number', 'fr_reveal_at',
        'sr_number', 'sr_reveal_at',

    ];

    protected $casts = [
        'game_date'    => 'date',
        'fr_number'    => 'integer',
        'sr_number'    => 'integer',
        'fr_reveal_at' => 'datetime',
        'sr_reveal_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot: defaults + edit locking
    |--------------------------------------------------------------------------
    */
    protected static function booted(): void
    {
        // Fill anything the admin did not provide: default times + random numbers
        static::creating(function (Game $game) {
            $date = $game->game_date->toDateString();

            $game->fr_reveal_at ??= Carbon::parse($date . ' ' . config('teer.fr_time', '16:00'));
            $game->sr_reveal_at ??= Carbon::parse($date . ' ' . config('teer.sr_time', '17:00'));

            $game->fr_number ??= static::randomNumber();
            $game->sr_number ??= static::randomNumber();
        });

        // Once a round's reveal time has passed, its number and time are locked
        static::updating(function (Game $game) {
            $now = now();

            $frOriginal = Carbon::parse($game->getRawOriginal('fr_reveal_at'));
            $srOriginal = Carbon::parse($game->getRawOriginal('sr_reveal_at'));

            if ($frOriginal->lte($now) && $game->isDirty(['fr_number', 'fr_reveal_at'])) {
                throw new \DomainException('F/R is already revealed and can no longer be changed.');
            }

            if ($srOriginal->lte($now) && $game->isDirty(['sr_number', 'sr_reveal_at'])) {
                throw new \DomainException('S/R is already revealed and can no longer be changed.');
            }

            foreach (['fr_number', 'sr_number'] as $field) {
                if ($game->isDirty($field) && ! static::isValidNumber($game->{$field})) {
                    throw new \InvalidArgumentException(
                        sprintf('%s must be between %02d and %02d.', $field, static::MIN_NUMBER, static::MAX_NUMBER)
                    );
                }
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function randomNumber(): int
    {
        return random_int(static::MIN_NUMBER, static::MAX_NUMBER);
    }

    public static function isValidNumber(mixed $n): bool
    {
        return is_numeric($n) && $n >= static::MIN_NUMBER && $n <= static::MAX_NUMBER;
    }

    /**
     * Admin action: generate the game for a date.
     * Times are optional ("H:i") and fall back to the defaults in config/teer.php.
     * If a game already exists for that date it is returned unchanged.
     */
public static function generateForDate(
    Carbon|string $date,
    ?string $frTime = null,
    ?string $srTime = null
): static {
    $date = Carbon::parse($date)->startOfDay();

    return static::firstOrCreate(
        ['game_date' => $date->toDateString()],
        [
            'fr_reveal_at' => Carbon::parse($date->toDateString() . ' ' . ($frTime ?? config('teer.fr_time', '16:00'))),
            'sr_reveal_at' => Carbon::parse($date->toDateString() . ' ' . ($srTime ?? config('teer.sr_time', '17:00'))),
        ]
    );
}

    /** Admin action: draw a fresh random number for a round that is not revealed yet. */
public function regenerate(string $round): static
{
    $this->assertRound($round);
    $this->update(["{$round}_number" => static::randomNumber()]);

    return $this;
}

    public function isRevealed(string $round): bool
    {
        $this->assertRound($round);

        return $this->{"{$round}_reveal_at"}->lte(now());
    }

    public function isFrRevealed(): bool { return $this->isRevealed('fr'); }
    public function isSrRevealed(): bool { return $this->isRevealed('sr'); }

    public function canEdit(string $round): bool
    {
        return ! $this->isRevealed($round);
    }

    private function assertRound(string $round): void
    {
        if (! in_array($round, ['fr', 'sr'], true)) {
            throw new \InvalidArgumentException("Round must be 'fr' or 'sr'.");
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Public accessors: never expose a number before its reveal time.
    | Use these (not fr_number / sr_number) on every public page and API.
    |--------------------------------------------------------------------------
    */
    public function getPublicFrAttribute(): ?string
    {
        return $this->isFrRevealed() ? sprintf('%02d', $this->fr_number) : null;
    }

    public function getPublicSrAttribute(): ?string
    {
        return $this->isSrRevealed() ? sprintf('%02d', $this->sr_number) : null;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes & relations
    |--------------------------------------------------------------------------
    */
    public function scopeForDate($query, Carbon|string $date)
    {
        return $query->whereDate('game_date', Carbon::parse($date)->toDateString());
    }

    public function scopeForMonth($query, int $year, int $month)
    {
        return $query->whereYear('game_date', $year)->whereMonth('game_date', $month);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
