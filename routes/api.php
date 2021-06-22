<?php

use App\Http\Controllers\DatabasesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\TablesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatabasesController::class, 'index']);
Route::post('/db', [DatabasesController::class, 'store']);
Route::get('/connection/{connection}/{database}/{table}', [TablesController::class, 'show']);
Route::get('/connection/{connection}/{database}/{table}/create',[ItemsController::class, 'create']);
Route::post('/connection/{connection}/{database}/{table}',[ItemsController::class, 'store']);
Route::get('/connection/{connection}/{database}/{table}/{id}/edit', [ItemsController::class, 'edit']);
Route::put('/connection/{connection}/{database}/{table}/{id}', [ItemsController::class, 'update']);
Route::delete('/connection/{connection}/{database}/{table}/{id}', [ItemsController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
