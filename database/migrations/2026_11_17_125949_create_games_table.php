<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * One row per calendar date. Each row holds both rounds:
     *  - F/R (default 4:00 PM)
     *  - S/R (default 5:00 PM)
     * All date/time values are stored in the app timezone (Asia/Kolkata).
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            // The date this game belongs to. Only one game per date.
            $table->date('game_date')->unique();

            // First Round
            $table->unsignedTinyInteger('fr_number');          // 1 - 99
            $table->dateTime('fr_reveal_at');                  // default 16:00, editable per date

            // Second Round
            $table->unsignedTinyInteger('sr_number');          // 1 - 99
            $table->dateTime('sr_reveal_at');                  // default 17:00, editable per date

           
            $table->timestamps();

            // Fast lookups for "what should be revealed now"
            $table->index('fr_reveal_at');
            $table->index('sr_reveal_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
