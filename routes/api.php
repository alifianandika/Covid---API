<?php

use App\Http\Controllers\PasienController;
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

// sesi 1
Route::get('/pasien',[PasienController::class, 'index']);
Route::get('/pasien/{id}',[PasienController::class, 'show']);
Route::post('/pasien',[PasienController::class, 'store']);
Route::delete('/pasien/{id}',[PasienController::class, 'delete']);
Route::put('/pasien/{id}',[PasienController::class, 'update']);

// sesi 2
Route::get('/pasien/status/positif',[PasienController::class, 'positif']);
Route::get('/pasien/status/recovered',[PasienController::class, 'recorvered']);
Route::get('/pasien/search/{name}',[PasienController::class, 'search']);
Route::get('/pasien/status/dead',[PasienController::class, 'dead']);



















