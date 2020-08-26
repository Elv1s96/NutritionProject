<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/kek','SearchController@index');
Route::get('/search','SearchController@search');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/allProducts','SearchController@allProducts');
    Route::get('/storeFromTable','NutritionController@storeFromTable')->name('storeFromTable');
    Route::get('/logout','Auth\LoginController@logout')->name('get-logout');
    Route::resource('fitness','FitnessController')->middleware('auth');
    Route::resource('product','ProductController')->middleware('auth');
    Route::resource('nutrition','NutritionController')->middleware('auth');
});
Route::get('/data-chart/{productId}','NutritionController@getAllNutritionData');
Route::get('/redis-example','HomeController@redisExample');
Route::post('/redis-event','HomeController@newEvent');
Route::get('/echo-chat','HomeController@echoChat');
Route::post('/echo-chat-send-message','HomeController@echoChatSendMessage');
