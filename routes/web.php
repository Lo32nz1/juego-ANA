<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pregame', function () {
    return Inertia::render('Game/pregame');
})->middleware('auth')->name('pregame');

Route::post('/games/store', function (Request $request) {
    $game = Game::create([
        'board_size' => $request->board_size,
        'status' => 'active',
    ]);
    return Inertia::render('Game/Game', ['gameId' => $game->id]);
})->middleware('auth')->name('games.store');

Route::get('/game/{gameId}', function ($gameId) {
    return Inertia::render('Game/Game', ['gameId' => $gameId]);
})->middleware('auth')->name('game');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
