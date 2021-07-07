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

Route::group(['middleware' => 'auth:api'], function () {
    Route::put('/like', 'App\Http\Controllers\ImageController@like');
    Route::put('/dislike', 'App\Http\Controllers\ImageController@dislike');

    Route::post('upload', 'App\Http\Controllers\ImageController@upload');
    Route::get('/see', 'App\Http\Controllers\ImageController@see');
    Route::get('/preferredlocation/{location}', 'App\Http\Controllers\ImageController@preferredlocation');
    
    Route::get('/methods', 'App\Http\Controllers\MethodsController@index');
    Route::post('/methods', 'App\Http\Controllers\MethodsController@store');
    Route::patch('/methods/{methods}', 'App\Http\Controllers\MethodsController@update');
    
    Route::get('/official', 'App\Http\Controllers\OfficialpostController@official');
    Route::post('/official', 'App\Http\Controllers\OfficialpostController@storepost');
    Route::patch('/official/{officialpost}', 'App\Http\Controllers\OfficialpostController@update');
    Route::delete('/official/{officialpost}', 'App\Http\Controllers\OfficialpostController@delete');
    Route::post('/profile', 'App\Http\Controllers\OfficialpostController@profile');
    Route::get('/later', 'App\Http\Controllers\ImageController@later');
    
    Route::get('/clients', 'App\Http\Controllers\ClientController@clients');
    Route::post('/clients', 'App\Http\Controllers\ClientController@register');
    Route::get('/clients/{id}', 'App\Http\Controllers\ClientController@show');
    Route::patch('/clients/{client}', 'App\Http\Controllers\ClientController@update');
    Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@delete');
    
    Route::get('/admin', 'App\Http\Controllers\PaymentController@admin');
    Route::get('/userpay', 'App\Http\Controllers\PaymentController@user');
    Route::post('/pay', 'App\Http\Controllers\PaymentController@pay');
    Route::post('status', 'App\Http\Controllers\PaymentController@status');
    Route::get('/dashboard', 'App\Http\Controllers\loginController@dashboard');
    
    Route::get('/adverts', 'App\Http\Controllers\HomuAdvertController@allAdverts');
    Route::get('/oneAdvert', 'App\Http\Controllers\HomuAdvertController@oneAdvert');
    Route::post('/adverts', 'App\Http\Controllers\HomuAdvertController@store');
    Route::get('/adverts/{id}', 'App\Http\Controllers\HomuAdvertController@show');
    Route::patch('/adverts/{id}', 'App\Http\Controllers\HomuAdvertController@update');
    Route::delete('/adverts/{id}', 'App\Http\Controllers\HomuAdvertController@delete');
    
    Route::get('/person', 'App\Http\Controllers\PersonalDataController@getUserData');
    Route::post('/person', 'App\Http\Controllers\PersonalDataController@store');
    Route::patch('/person/{id}', 'App\Http\Controllers\PersonalDataController@update');
    Route::delete('/person/{id}', 'App\Http\Controllers\PersonalDataController@delete');
    
    Route::get('/pic', 'App\Http\Controllers\PicController@index');
    Route::post('pic', 'App\Http\Controllers\PicController@pic');
    
    Route::get('/index', 'App\Http\Controllers\ProductController@index');
    Route::post('/store', 'App\Http\Controllers\ProductController@store');
    Route::get('/show', 'App\Http\Controllers\ProductController@show');
    Route::put('/update', 'App\Http\Controllers\ProductController@update');
    Route::delete('/destroy', 'App\Http\Controllers\ProductController@destroy');
    Route::post('/logout', 'App\Http\Controllers\loginController@logout');

});