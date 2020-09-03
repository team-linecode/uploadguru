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
Route::get('/auth', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index');
    Route::post('/addfiles', 'DashboardController@add');
    Route::get('/deletefiles/{id}', 'DashboardController@delete');
    
    Route::get('/user', 'UserController@index');
    Route::post('/adduser', 'UserController@add');
    Route::get('/edituser/{id}', 'UserController@edit');
    Route::post('/updateuser', 'UserController@update');
    Route::get('/deleteuser/{id}', 'UserController@delete');
    
    Route::get('/upload', 'UploadController@index');
    Route::post('/addfile', 'UploadController@add');
    Route::get('/deletefile/{id}', 'UploadController@delete');


    Route::get('/logout', 'AuthController@logout');
});