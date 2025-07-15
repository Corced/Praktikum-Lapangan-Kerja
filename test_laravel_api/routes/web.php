<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LayananController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/chat', 'chat');
Route::post('/chat', [ChatController::class, 'handle']);
Route::resource('faqs', FaqController::class);
Route::resource('layanans', LayananController::class);