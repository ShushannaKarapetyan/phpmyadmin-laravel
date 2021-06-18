<?php

use App\Http\Controllers\DatabasesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatabasesController::class, 'index']);
Route::post('/db', [DatabasesController::class, 'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
