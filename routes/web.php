<?php

use App\Http\Controllers\{
    ChatController
};
use Illuminate\Support\Facades\Route;

Route::get('/chat', [ChatController::class, 'index'])->name('chat');

Route::redirect('/', '/chat')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
