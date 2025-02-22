<?php

use App\Http\Controllers\ItemController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
  Route::post('/objects', [ItemController::class, 'store'])->name('objects.store');
  Route::get('/objects/get_all_records', [ItemController::class, 'getAllRecords'])->name('objects.records.index');
  Route::get('/object/{key}', [ItemController::class, 'show'])->name('objects.key');
});
