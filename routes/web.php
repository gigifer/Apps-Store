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

Route::get('/', function () {
    return view('welcome'); });

Route:: get('/', 'CatalogeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/detail/{id}', 'CatalogeController@show');

Route::group([
    'middleware' => 'developer',
    'prefix' => 'me'
], function () {
  Route::resource('application', 'ApplicatiosController'); });

Route::group([
    'middleware' => 'client',
    'prefix' => 'me'
], function () {
  Route::resource('client', 'ClientController'); });

Route::post('/api/buy', 'BuyController@store');
Route::delete('/api/buy/{id}', 'BuyController@destroy');
