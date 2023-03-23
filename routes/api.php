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

Route::get('avis',[App\Http\Controllers\AvisController::class,'List']);
Route::get('avi/{id}',[App\Http\Controllers\AvisController::class,'View']);
Route::post('avi',[App\Http\Controllers\AvisController::class,'Create']);
Route::put('avi/{id}',[App\Http\Controllers\AvisController::class,'Update']);
Route::put('avi_content/{id}',[App\Http\Controllers\AvisController::class,'Update_Content']);
Route::delete('avi/{id}',[App\Http\Controllers\AvisController::class,'Delete']);



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

Route::get('ping',function(){
    echo "MS AVIS ";
    echo date("Y-m-d h:i:s");
});


