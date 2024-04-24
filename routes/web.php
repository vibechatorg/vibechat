<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChatController;


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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ChatController::class)->middleware(['auth'])->name("chat.")->prefix("chat")->group(function () {
    Route::post('/send-message', 'send');
    Route::get('/messages','getMessage');
    Route::get('/rooms', 'getRooms');
    Route::post('/rooms', 'create');
    Route::get('/rooms/{roomId}', 'getRoom');
    Route::post('/rooms/{roomId}/join', 'join');
    Route::post('/rooms/{roomId}/leave', 'leave');

    Route::get('/', 'index');
    Route::get('/{type}/{id}', 'show');
});

require __DIR__.'/auth.php';
