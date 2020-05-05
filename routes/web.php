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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company', 'CompanyController@index')->name('company');
Route::post('/add-service', 'CompanyController@addService');
Route::post('/delete-service', 'CompanyController@deleteService');
Route::post('/add-staff', 'CompanyController@addStaff');
Route::post('/delete-staff', 'CompanyController@deleteStaff');
Route::get('/booking', 'ClientController@index');
Route::get('/reg', 'CompanyController@register_form');
Route::post('/reg', 'CompanyController@register');
