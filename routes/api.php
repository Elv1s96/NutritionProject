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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/get-all-products','ProductController@getAllProducts');
Route::post('/get-user-fitness-info/{userId}','FitnessController@getUserFitnessInfo');
Route::post('/get-nutrition-data/{userId}','NutritionController@getNutritionData');
Route::post('/delete-from-nutrition/{productId}/{userId}/{pivotId}','NutritionController@deleteFromNutrition');
Route::post('/send-water-info/{userId}/{amountOfWater}','NutritionController@sendWaterInfo');
Route::post('/get-water-info/{userId}','NutritionController@getWaterInfo');
