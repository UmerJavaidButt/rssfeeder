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
Auth::routes();
Route::get('/', 'RssController@index');
Route::get('feed', 'RssController@index');
Route::post('feed', 'RssController@feed')->name('feed');
Route::get('competitors', 'RssController@competitors')->name('competitors');
Route::get('savedProducts', 'RssController@savedProducts')->name('savedProducts');
Route::get('subscribe', 'RssController@subscribe')->name('subscribe');
Route::post('subscribeURL', 'SubscriptionController@subscribe_url')->name('subscribe_url');
Route::get('pricing', 'PricingController@index')->name('pricing');

Route::get('verify/{email_token}','Auth\RegisterController@verify');
Route::get('addmoney/stripe/{amount}', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));

Route::get('scrapper', 'ScrapController@rss_scrap')->name('scrapper');
Route::post('filter', 'RssController@filter')->name('filter');
Route::get('filter', 'RssController@index')->name('filter');

Route::get('rate_product/{id}/{val}', 'RssController@rate_product')->name('rate_product');

Route::get('manage_account', 'HomeController@upload_image')->name('manage_account');
Route::post('account_settings', 'HomeController@user_settings')->name('account_settings');

