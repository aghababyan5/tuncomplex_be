<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Partners\DeletePartnerController;
use App\Http\Controllers\Partners\GetPartnersController;
use App\Http\Controllers\Partners\ShowPartnerController;
use App\Http\Controllers\Partners\StorePartnerController;
use App\Http\Controllers\Partners\UpdatePartnerController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'api'],
    function () {
        Route::post('/register', RegisterController::class);
        Route::get('/partners', GetPartnersController::class); // tested
        Route::get('/partner/{id}', ShowPartnerController::class); // tested
        Route::post('/partner', StorePartnerController::class); // tested
        Route::post('/partner/{id}', UpdatePartnerController::class); // tested
        Route::delete('/partner/{id}', DeletePartnerController::class); //
        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('/logout', LogoutController::class);
        });
    });
