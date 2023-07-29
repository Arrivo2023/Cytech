<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/sarch_index', [App\Http\Controllers\SarchController::class, 'apiIndex'])->name('index');
Route::get('/sarch', [App\Http\Controllers\SarchController::class, 'sarchList'])->name('sarchList');

