<?php
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
Route::get('/indexCommerce','CommerceController@index');

Route::get('/indexAvis','AvisController@index');

Route::get('/reglerAvis/{uid_avis}','AvisController@regler');

Route::get('/detailsAvis/{uid_avis}','AvisController@show');

Route::get('/',function(){
  return view('PagePrincipale');
});

Route::get('/commerce','CommerceController@find');

Route::get('allHistory/{ref_part}','CommerceController@showAll');

Route::get('commerce/{ref_part}','CommerceController@show');

Route::get('/test','CommerceController@test');
