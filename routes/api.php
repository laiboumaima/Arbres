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
/*************************** Arbre api  ****************************** */
Route::apiResource('/arbres','ArbreController');


/*
Route::post('arbre','ArbreController@store');
Route::get('arbre/{arbre}','ArbreController@show');
Route::get('arbre/{arbre}/elements','ArbreController@show_elemnts');
Route::get('arbres','ArbreController@index');
Route::delete('arbre/{arbre}','ArbreController@destroy');
Route::put('arbre/{arbre}','ArbreController@update');*/
/************************************************************************* */
/********Element api******************************************************* */
/*
Route::post('arbre/{arbre}/element','ElementController@store');
Route::get('element/{element}','ElementController@show');
Route::get('element/{element}/attributs','ElementController@show_attributs');
Route::get('elements','ElementController@index');
Route::delete('element/{element}','ElementController@destroy');*/
Route::group(['prefix'=>'arbres'],function(){
	Route::apiResource('/{arbre}/elements','ElementController');
  
});
/**************Attributs************************************************************ */
Route::group(['prefix'=>'arbres/{arbre}/elements'],function(){
    Route::apiResource('/{element}/attributs','AttributController');

});