<?php
use Illuminate\Support\Facades\Route;
/*
/ WEB ROUTES
*/

// Standard Laravel Auth Routes with ['verify' => 'true']
Auth::routes(['verify' => 'true']);

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/testers', 'TesterController@index')->name('testers');
Route::post('/testers', 'TesterController@create')->name('tester-request');
Route::get('/testers/mail/preview', 'TesterController@preview')->name('preview-tester-email');

Route::get('/breeders', 'BreederController@index')->name('breeders');

Route::get('/strains', 'StrainController@index')->name('strains');
Route::get('strains/create', 'StrainController@create')->middleware('role:admin');
Route::get('api/strains', 'StrainController@list')->name('strains.create')->middleware('role:admin');
Route::post('api/strains', 'StrainController@store')->middleware('role:admin');

