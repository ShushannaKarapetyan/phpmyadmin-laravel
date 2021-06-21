<?php

use App\Http\Controllers\DatabasesController;
use App\Http\Controllers\TablesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatabasesController::class, 'index']);
Route::post('/db', [DatabasesController::class, 'store']);
//Route::get('/database/{database}/{table}', [TablesController::class, 'show']);

Route::get('/connection/{connection}/{database}/{table}', [TablesController::class, 'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
