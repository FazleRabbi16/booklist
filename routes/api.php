<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//get all booklists
Route::get('/booklists','BooklistController@index');
//get Single booklist
Route::get('booklist/{id}','BooklistController@show');
//Create new book 
Route::post('booklist','BooklistController@store');
//update a book
Route::put('updatebooklist/{id}','BooklistController@update');
//Delete a book
Route::delete('deletebooklist/{id}','BooklistController@destroy');
