<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('vehicules',[App\Http\Controllers\VehiculesController::class,'List']);
Route::get('vehicule/{id}',[App\Http\Controllers\VehiculesController::class,'View']);
Route::post('vehicule',[App\Http\Controllers\VehiculesController::class,'Create']);
Route::put('vehicule/{id}',[App\Http\Controllers\VehiculesController::class,'Update']);
Route::delete('vehicule/{id}',[App\Http\Controllers\VehiculesController::class,'Delete']);

Route::get('for_ids/{ids}',[App\Http\Controllers\VehiculesController::class,'ListForIds']);


// STANDARD SERVICE API CALLS
// API CLIENTS
/*
Route::post('client_register',[AuthController::class,'register']);
Route::post('client_login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:api']], function () {

    Route::post('products',function(){
        echo "Obel: I did not received your data! 2";
        print_r($_POST);
    });
  
    Route::post('client_logout', [AuthController::class, 'logout']);
});
*/


