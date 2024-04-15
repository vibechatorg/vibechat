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


Route::post('/send-message', [ChatController::class, 'sendMessage']);
Route::get('/messages', [ChatController::class, 'getMessages']);
Route::get('/rooms', [ChatController::class, 'getRooms']);
Route::post('/rooms', [ChatController::class, 'createRoom']);
Route::get('/rooms/{roomId}', [ChatController::class, 'getRoom']);
Route::post('/rooms/{roomId}/join', [ChatController::class, 'joinRoom']);
Route::post('/rooms/{roomId}/leave', [ChatController::class, 'leaveRoom']);


Route::get('/chat', function () {
    return Inertia::render('ChatComponent', ['roomId' => 'defaultRoomId']);
});

require __DIR__.'/auth.php';
