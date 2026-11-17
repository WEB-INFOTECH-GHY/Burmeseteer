<?php

return [
    /*
    | Default reveal times (24h "H:i", in the app timezone = Asia/Kolkata).
    | An admin can override these for a single date when generating/editing a game.
    */
    'fr_time' => env('TEER_FR_TIME', '16:00'),
    'sr_time' => env('TEER_SR_TIME', '17:00'),
];
