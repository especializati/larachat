<?php

use App\Http\Controllers\Api\{
    ChatApiController,
    FavoriteApiController,
    UserApiController
};
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
->middleware(['auth:web'])
->group(function () {

    Route::get('/users', [UserApiController::class, 'index']);

    Route::post('/messages', [ChatApiController::class, 'store']);
    Route::get('/messages/{id}', [ChatApiController::class, 'messagesWithUser']);

    Route::get('/favorites', [FavoriteApiController::class, 'myFavorites']);
    Route::post('/favorites', [FavoriteApiController::class, 'store']);
    Route::delete('/favorites', [FavoriteApiController::class, 'destroy']);
});

Route::get('/', function () {
    return ['message' => 'ok'];
});
