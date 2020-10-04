<?php

use App\CityMun;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;

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
Route::get('/ctracing/edit/{citymun}', 'ContactTracingController@edit');
Route::patch('/ctracing/edit/{citymun}', 'ContactTracingController@update');
Route::get('/ctracing/index/data', 'ContactTracingController@tabledata');
Route::get('/ctracing/edit/{citymun}/data', 'ContactTracingController@citymundata');


Route::get('/barangay', 'BarangayController@create');
Route::get('/barangay/index', 'BarangayController@index');
Route::post('/barangay', 'BarangayController@store');
Route::get('/barangay/{barangay}', 'BarangayController@delete');

Route::get('/profile/{user}','PersonalDetailsController@index')->name('profile.show');
Route::patch('/profile/{user}','PersonalDetailsController@update')->name('profile.update');
Route::post('/profile/{user}','PersonalDetailsController@store')->name('profile.store');
Route::get('/profile/{user}/edit','PersonalDetailsController@edit')->name('profile.edit');
Route::get('/profile/{user}/store','PersonalDetailsController@create')->name('profile.create');
Route::get('/profile/{user}/data','PersonalDetailsController@data')->name('profile.data');

Route::get('/users','UserManagementController@index');
Route::patch('/users/{user}','UserManagementController@update');

Route::get('/logs','LogsController@index');

Route::get('/scan/{user}','ScannerController@index')->name('scan.show');
Route::post('/scan/{user}','ScannerController@store');

Route::get('/map','MapController@index');
Route::get('/map/data', function () {
    $citymuns = \App\CityMun::select('cmdesc','cmclass','latitude','longitude')->get();
    return response()->json($citymuns);
});