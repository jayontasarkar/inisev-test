<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', PostController::class)->only(['index', 'create']);
Route::post('/subscribers', [SubscriberController::class, 'subscribe']);
