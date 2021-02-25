<?php

use App\Http\Controllers\Api\{
    UserApiController
};
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
->group(function () {

    Route::get('/users', [UserApiController::class, 'index']);

});

Route::get('/', function () {
    return ['message' => 'ok'];
});
