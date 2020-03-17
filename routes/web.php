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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'cors'], function ()
{
    Route::get('/country/{country}/{nth}', 'CasesController@getCountry');
    Route::get('/daily/{type}/{nth}', 'DailyController@getDaily');
    Route::get('/info', 'InfoController@getInfo');
    Route::get('/countries', 'CasesController@getCountries');
});
