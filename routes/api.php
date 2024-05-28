<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("index-barang",[ImageController::class,"index"]);
Route::post("store-barang",[ImageController::class,"store"]);
Route::post("update-barang/{id}",[ImageController::class,"update"]);
Route::delete("delete-barang/{id}",[ImageController::class,"destroy"]);
