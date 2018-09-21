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

Route::get('/', 'HomeController@index');
Route::post('feed', 'RssController@feed')->name('feed');
Route::get('subscribe', 'RssController@subscribe')->name('subscribe');
Route::get('pricing', 'PricingController@index')->name('pricing');

Auth::routes(['verify' => true]);

// Route::get('home', function(){
// 	return redirect('/');
// })->middleware('verified');
