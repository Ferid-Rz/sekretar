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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company', 'CompanyController@index')->name('company')->middleware('auth');;
Route::post('/add-service', 'CompanyController@addService')->middleware('auth');;
Route::post('/delete-service', 'CompanyController@deleteService')->middleware('auth');;
Route::post('/add-staff', 'CompanyController@addStaff')->middleware('auth');;
Route::post('/delete-staff', 'CompanyController@deleteStaff')->middleware('auth');;
Route::get('/booking', 'ClientController@index');
Route::get('/reg', 'CompanyController@register_form');
Route::post('/reg', 'CompanyController@register');

Route::get('/', 'ClientController@index')->name('client');
Route::get('/company/{id}', 'ClientController@company')->name('client');
Route::post('/add-to-slider', 'CompanyController@addSlider')->middleware('auth');;
Route::post('/delete-slider', 'CompanyController@deleteSlider')->middleware('auth');;

Route::post('/show-masters', 'ClientController@showMasters');
