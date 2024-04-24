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
    Route::post('/send-message', 'send')->name("send");
    Route::get('/messages','getMessage')->name("messages");
    Route::get('/rooms', 'getRooms')->name("rooms");
    Route::post('/rooms', 'create')->name("create");
    Route::get('/rooms/{roomId}', 'getRoom')->name("room");
    Route::post('/rooms/{roomId}/join', 'join')->name("join");
    Route::post('/rooms/{roomId}/leave', 'leave')->name("leave");

    // Frontend Routes Daan
    Route::get('/', 'index')->name("index");
    Route::get('/{chat}', 'show')->name("show");
});

require __DIR__.'/auth.php';
