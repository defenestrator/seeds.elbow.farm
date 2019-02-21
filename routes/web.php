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

Route::prefix('/admin/')->name('admin.')->middleware('role:admin')->group( function () {

    Route::get('strains/create', 'StrainController@create')->name('strains.create');

    Route::get('strains/', 'StrainController@list')->name('strains.list');

    Route::get('strains/{id}', 'StrainController@edit')->name('strains.edit');

    Route::post('strains/', 'StrainController@store')->name('strains.store');

    Route::post('strains/{id}', 'StrainController@update')->name('strains.update');

    Route::get('strains/destroy/{id}', 'StrainController@destroy')->name('strains.delete');
});


