<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
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

Route::get('/bright', 'Controllers\BrightController@index');
Route::post('/bright', 'Controllers\BrightController@store');

Route::get('/laptop', 'Controllers\LaptopController@index');
Route::post('/laptop', 'Controllers\LaptopController@store');


Route::get('/search', 'Controllers\SearchController@index');
Route::get('/fone', 'Controllers\ImageController@fone');
Route::get('/ftwo', 'Controllers\ImageController@ftwo');
Route::get('/mukono', 'Controllers\ImageController@fmukono');
Route::get('/kira', 'Controllers\ImageController@fkira');
Route::get('uploads', 'Controllers\ImageController@uploads');
Route::post('/signup', 'Controllers\loginController@signup');
Route::post('/login', 'Controllers\loginController@login');
Route::get('/late', 'Controllers\ImageController@late');

Route::get('/arcade', 'Controllers\ImageController@arcade');
Route::get('/hostel', 'Controllers\ImageController@hostel');
Route::get('/mall', 'Controllers\ImageController@mall');
Route::get('/officespace', 'Controllers\ImageController@officespace');
Route::get('/apartment', 'Controllers\ImageController@apartment');
Route::get('/rental', 'Controllers\ImageController@rental');

Route::get('kampalahostels', 'Controllers\ImageController@kampalahostels');
Route::get('/show/{id}', 'Controllers\ImageController@show');
Route::get('/countofproperties', 'Controllers\ImageController@count');

Route::post('upload', 'Controllers\ImageController@upload')->middleware('auth:api');
Route::get('/see', 'Controllers\ImageController@see')->middleware('auth:api');
Route::get('/preferredlocation/{location}', 'Controllers\ImageController@preferredlocation')->middleware('auth:api');

Route::get('/methods', 'Controllers\MethodsController@index')->middleware('auth:api');
Route::post('/methods', 'Controllers\MethodsController@store')->middleware('auth:api');
Route::patch('/methods/{methods}', 'Controllers\MethodsController@update')->middleware('auth:api');

Route::get('/official', 'Controllers\OfficialpostController@official')->middleware('auth:api');
Route::post('/official', 'Controllers\OfficialpostController@storepost')->middleware('auth:api');
Route::patch('/official/{officialpost}', 'Controllers\OfficialpostController@update')->middleware('auth:api');
Route::delete('/official/{officialpost}', 'Controllers\OfficialpostController@delete')->middleware('auth:api');
Route::post('/profile', 'Controllers\OfficialpostController@profile')->middleware('auth:api');
Route::get('/later', 'Controllers\ImageController@later')->middleware('auth:api');

Route::get('/clients', 'Controllers\ClientController@clients')->middleware('auth:api');
Route::post('/clients', 'Controllers\ClientController@register')->middleware('auth:api');
Route::get('/clients/{id}','Controllers\ClientController@show')->middleware('auth:api');
Route::patch('/clients/{client}', 'Controllers\ClientController@update')->middleware('auth:api');
Route::delete('/clients/{client}', 'Controllers\ClientController@delete')->middleware('auth:api');

Route::get('/admin', 'Controllers\PaymentController@admin')->middleware('auth:api');
Route::get('/userpay', 'Controllers\PaymentController@user')->middleware('auth:api');
Route::post('/pay', 'Controllers\PaymentController@pay')->middleware('auth:api');
Route::post('status', 'Controllers\PaymentController@status')->middleware('auth:api');
Route::get('/dashboard', 'Controllers\loginController@dashboard')->middleware('auth:api');

Route::get('/adverts', 'Controllers\HomuAdvertController@allAdverts')->middleware('auth:api');
Route::get('/oneAdvert', 'Controllers\HomuAdvertController@oneAdvert')->middleware('auth:api');
Route::post('/adverts', 'Controllers\HomuAdvertController@store')->middleware('auth:api');
Route::get('/adverts/{id}', 'Controllers\HomuAdvertController@show')->middleware('auth:api');
Route::patch('/adverts/{id}', 'Controllers\HomuAdvertController@update')->middleware('auth:api');
Route::delete('/adverts/{id}', 'Controllers\HomuAdvertController@delete')->middleware('auth:api');

Route::get('/person', 'Controllers\PersonalDataController@getUserData')->middleware('auth:api');
Route::post('/person', 'Controllers\PersonalDataController@store')->middleware('auth:api');
Route::patch('/person/{id}', 'Controllers\PersonalDataController@update')->middleware('auth:api');
Route::delete('/person/{id}', 'Controllers\PersonalDataController@delete')->middleware('auth:api');

Route::get('/pic', 'Controllers\PicController@index')->middleware('auth:api');
Route::post('pic', 'Controllers\PicController@pic')->middleware('auth:api');

Route::get('/index', 'Controllers\ProductController@index')->middleware('auth:api');
Route::post('/store', 'Controllers\ProductController@store')->middleware('auth:api');
Route::get('/show', 'Controllers\ProductController@show')->middleware('auth:api');
Route::put('/update', 'Controllers\ProductController@update')->middleware('auth:api');
Route::delete('/destroy', 'Controllers\ProductController@destroy')->middleware('auth:api');
Route::post('/logout', 'Controllers\loginController@logout')->middleware('auth:api');