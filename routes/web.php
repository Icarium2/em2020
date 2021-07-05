<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\PointsTableController;
use App\Http\Controllers\TodaysGamesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GamesController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/games', [GamesController::class, 'index'])->name('games');
    Route::get('/groups', [GroupsController::class, 'index'])->name('groups');
    Route::get('/today', [TodaysGamesController::class, 'index'])->name('today');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/poangligan', [PointsTableController::class, 'index'])->name('poangligan');
    Route::get('/poang', [PointsTableController::class, 'gatheredPoints'])->name('poang');

});
require __DIR__.'/auth.php';
