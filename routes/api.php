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
        Route::get('/partners/{id}', ShowPartnerController::class); // tested
        Route::post('/partners', StorePartnerController::class); // tested
        Route::post('/partners/{id}', UpdatePartnerController::class);
        Route::delete('/partners/{id}', DeletePartnerController::class); // tested
        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('/logout', LogoutController::class);
        });
    });

/*
 * GET {host}/api/partners = sax partnyornerin iranc datanerov full get a anum
 * GET {host}/api/partners/{id} = mi hat partnyorin a get anum yst id-i
 * POST {host}/api/partners = partnyor sarqelu hamara, petq en esqan baner: icon (nkarna), name, description, website_url
 * POST {host}/api/partners/{id} = partyor update anelu hamara, nuyn dzevi: icon, name, description, website_url
 * DELETE {host}/api/partners{id} = partnyor jnjelu hamara
 */
