<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;


Route::group(['namespace' => 'Admin'],function(){
    Route::get('/admin/login',[LoginController::class,'index'])->name('admin.login_form');
    Route::post('/login', [LoginController::class,'adminLogin']);

// secure route is here
    Route::group(['middleware'=>'auth:admin','prefix'=>'admin', 'as'=>'admin.'],function(){
        Route::get('/dashboard', [DashboardController::class,'dashboardView'])->name('dashboard');

        Route::post('logout', [LoginController::class,'logout'])->name('logout');
        Route::get('/change/password/form', [DashboardController::class,'changePasswordForm'])->name('change_password_form');
        Route::post('/change/password', [DashboardController::class,'changePassword'])->name('change_password');
        // all routes after this.

Route::post('/game/generate', [GameController::class, 'generate'])->name('game.generate');
Route::put('/game/{game}', [GameController::class, 'update'])->name('game.update');

Route::get('/games', [GameController::class, 'index'])->name('game.index');



    });
// secure route


});
