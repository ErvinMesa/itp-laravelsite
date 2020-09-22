<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ctracing', 'ContactTracingController@create');
Route::get('/ctracing/index', 'ContactTracingController@index');
Route::post('/ctracing', 'ContactTracingController@store');
Route::get('/ctracing/{citymun}', 'ContactTracingController@delete');


Route::get('/barangay', 'BarangayController@create');
Route::post('/barangay', 'BarangayController@store');

Route::get('/profile/{user}','PersonalDetailsController@index')->name('profile.show');
Route::patch('/profile/{user}','PersonalDetailsController@update')->name('profile.update');
Route::get('/profile/{user}/edit','PersonalDetailsController@edit')->name('profile.edit');