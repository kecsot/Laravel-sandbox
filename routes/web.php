<?php

use App\Http\Controllers\DeckCardController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\RoleUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('podcasts', PodcastController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::resource('decks', DeckController::class);
    Route::resource('decks.cards', DeckCardController::class)->except(['index']);

    Route::resource('roles', RoleController::class);
    Route::resource('roles.permissions', RolePermissionController::class)->only(['store', 'create', 'destroy']);
    Route::resource('roles.users', RoleUserController::class)->only(['store', 'create', 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
