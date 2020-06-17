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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::resource('departments', 'DepartmentController');
Route::resource('municipalities', 'MunicipalityController');
Route::resource('addresses', 'AddressController');

Route::put('users/desactivar/{id}', 'UserController@desactivar');

Route::get('account', 'UserController@myAccount');
Route::put('update-photo', 'UserController@updatePhoto');

Route::get('showCategory', 'CategoryController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');