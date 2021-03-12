<?php

use App\Http\Controllers\Api\{
    ChatApiController,
    UserApiController
};
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
->middleware(['auth:web'])
->group(function () {

    Route::get('/users', [UserApiController::class, 'index']);

    Route::post('/messages', [ChatApiController::class, 'store']);
    Route::get('/messages/{id}', [ChatApiController::class, 'messagesWithUser']);

});

Route::get('/', function () {
    return ['message' => 'ok'];
});
