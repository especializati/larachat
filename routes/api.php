<?php

use App\Http\Controllers\Api\{
    ChatApiController,
    FavoriteApiController,
    ProfileApiController,
    UserApiController
};
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
->middleware(['auth:web'])
->group(function () {
    Route::get('/me', [ProfileApiController::class, 'me']);
    Route::post('/logout', [ProfileApiController::class, 'logout']);

    Route::patch('/profile/update-preference', [ProfileApiController::class, 'updatePreference']);
    Route::patch('/profile/remove-image-chat', [ProfileApiController::class, 'removeImageChat']);
    Route::patch('/profile/update-image-chat', [ProfileApiController::class, 'updatePreferenceImageChat']);
    Route::patch('/profile/update-photo', [ProfileApiController::class, 'updatePhoto']);
    Route::patch('/profile/update', [ProfileApiController::class, 'update']);

    Route::get('/users', [UserApiController::class, 'index']);

    Route::patch('/messages/mark_as_read', [ChatApiController::class, 'markMessagesAsRead']);
    Route::post('/messages', [ChatApiController::class, 'store']);
    Route::get('/messages/{id}', [ChatApiController::class, 'messagesWithUser']);

    Route::get('/favorites', [FavoriteApiController::class, 'myFavorites']);
    Route::post('/favorites', [FavoriteApiController::class, 'store']);
    Route::delete('/favorites', [FavoriteApiController::class, 'destroy']);
});

Route::get('/', function () {
    return ['message' => 'ok'];
});
