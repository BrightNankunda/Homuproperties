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

Route::get('/bright', 'App\Http\Controllers\BrightController@index');
Route::post('/bright', 'App\Http\Controllers\BrightController@store');

Route::get('/laptop', 'App\Http\Controllers\LaptopController@index');
Route::post('/laptop', 'App\Http\Controllers\LaptopController@store');


Route::get('/search', 'App\Http\Controllers\SearchController@index');
Route::get('/fone', 'App\Http\Controllers\ImageController@fone');
Route::get('/ftwo', 'App\Http\Controllers\ImageController@ftwo');
Route::get('/mukono', 'App\Http\Controllers\ImageController@fmukono');
Route::get('/kira', 'App\Http\Controllers\ImageController@fkira');
Route::get('uploads', 'App\Http\Controllers\ImageController@uploads');
Route::post('/signup', 'App\Http\Controllers\loginController@signup');
Route::post('/login', 'App\Http\Controllers\loginController@login');
Route::get('/late', 'App\Http\Controllers\ImageController@late');

Route::get('/arcade', 'App\Http\Controllers\ImageController@arcade');
Route::get('/hostel', 'App\Http\Controllers\ImageController@hostel');
Route::get('/mall', 'App\Http\Controllers\ImageController@mall');
Route::get('/officespace', 'App\Http\Controllers\ImageController@officespace');
Route::get('/apartment', 'App\Http\Controllers\ImageController@apartment');
Route::get('/rental', 'App\Http\Controllers\ImageController@rental');

Route::get('kampalahostels', 'App\Http\Controllers\ImageController@kampalahostels');
Route::get('/show/{id}', 'App\Http\Controllers\ImageController@show');
Route::get('/countofproperties', 'App\Http\Controllers\ImageController@count');

Route::post('upload', 'App\Http\Controllers\ImageController@upload')->middleware('auth:api');
Route::get('/see', 'App\Http\Controllers\ImageController@see')->middleware('auth:api');

Route::get('/methods', 'App\Http\Controllers\MethodsController@index')->middleware('auth:api');
Route::post('/methods', 'App\Http\Controllers\MethodsController@store')->middleware('auth:api');
Route::patch('/methods/{methods}', 'App\Http\Controllers\MethodsController@update')->middleware('auth:api');

Route::get('/official', 'App\Http\Controllers\OfficialpostController@official')->middleware('auth:api');
Route::post('/official', 'App\Http\Controllers\OfficialpostController@storepost')->middleware('auth:api');
Route::patch('/official/{officialpost}', 'App\Http\Controllers\OfficialpostController@update')->middleware('auth:api');
Route::delete('/official/{officialpost}', 'App\Http\Controllers\OfficialpostController@delete')->middleware('auth:api');
Route::post('/profile', 'App\Http\Controllers\OfficialpostController@profile')->middleware('auth:api');
Route::get('/later', 'App\Http\Controllers\ImageController@later')->middleware('auth:api');

Route::get('/clients', 'App\Http\Controllers\ClientController@clients')->middleware('auth:api');
Route::post('/clients', 'App\Http\Controllers\ClientController@register')->middleware('auth:api');
Route::get('/clients/{id}','App\Http\Controllers\ClientController@show')->middleware('auth:api');
Route::patch('/clients/{id}', 'App\Http\Controllers\ClientController@update')->middleware('auth:api');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@delete')->middleware('auth:api');

Route::get('/admin', 'App\Http\Controllers\PaymentController@admin')->middleware('auth:api');
Route::get('/userpay', 'App\Http\Controllers\PaymentController@user')->middleware('auth:api');
Route::post('/pay', 'App\Http\Controllers\PaymentController@pay')->middleware('auth:api');
Route::post('status', 'App\Http\Controllers\PaymentController@status')->middleware('auth:api');
Route::get('/dashboard', 'App\Http\Controllers\loginController@dashboard')->middleware('auth:api');

Route::get('/adverts', 'App\Http\Controllers\HomuAdvertController@allAdverts')->middleware('auth:api');
Route::get('/oneAdvert', 'App\Http\Controllers\HomuAdvertController@oneAdvert')->middleware('auth:api');
Route::post('/adverts', 'App\Http\Controllers\HomuAdvertController@store')->middleware('auth:api');
Route::get('/adverts/{id}', 'App\Http\Controllers\HomuAdvertController@show')->middleware('auth:api');
Route::patch('/adverts/{id}', 'App\Http\Controllers\HomuAdvertController@update')->middleware('auth:api');
Route::delete('/adverts/{id}', 'App\Http\Controllers\HomuAdvertController@delete')->middleware('auth:api');

Route::get('/person', 'App\Http\Controllers\PersonalDataController@getUserData')->middleware('auth:api');
Route::post('/person', 'App\Http\Controllers\PersonalDataController@store')->middleware('auth:api');
Route::patch('/person/{id}', 'App\Http\Controllers\PersonalDataController@update')->middleware('auth:api');
Route::delete('/person/{id}', 'App\Http\Controllers\PersonalDataController@delete')->middleware('auth:api');

Route::get('/pic', 'App\Http\Controllers\PicController@index')->middleware('auth:api');
Route::post('pic', 'App\Http\Controllers\PicController@pic')->middleware('auth:api');

Route::get('/index', 'App\Http\Controllers\ProductController@index')->middleware('auth:api');
Route::post('/store', 'App\Http\Controllers\ProductController@store')->middleware('auth:api');
Route::get('/show', 'App\Http\Controllers\ProductController@show')->middleware('auth:api');
Route::put('/update', 'App\Http\Controllers\ProductController@update')->middleware('auth:api');
Route::delete('/destroy', 'App\Http\Controllers\ProductController@destroy')->middleware('auth:api');
Route::post('/logout', 'App\Http\Controllers\loginController@logout')->middleware('auth:api');