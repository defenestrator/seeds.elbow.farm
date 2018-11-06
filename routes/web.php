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
Auth::routes();
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/testers', 'TesterController@index')->name('testers');
Route::get('/breeders', 'BreederController@index')->name('breeders');
Route::get('/strains', 'StrainController@index')->name('strains');
Route::get('/home', 'HomeController@index')->name('home');

