<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/chat', 'chat');
Route::post('/chat', [ChatController::class, 'handle']);

