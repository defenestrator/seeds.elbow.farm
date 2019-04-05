<?php
use Illuminate\Support\Facades\Route;
/*
/ WEB ROUTES
*/

// Standard Laravel Auth Routes with ['verify' => 'true']
Auth::routes(['verify' => 'true']);

// Homepage
Route::get('/', 'WelcomeController@index')->name('welcome');

// Authenticated User Dashboard
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Tester Applications
Route::get('/testers', 'TesterController@index')->name('testers');
Route::post('/testers', 'TesterController@create')->name('tester-request');
Route::get('/testers/mail/preview', 'TesterController@preview')->name('preview-tester-email');

// Contact
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

// Breeders
Route::get('/breeders', 'BreederController@index')->name('breeders');

// Strains
Route::get('/strains', 'StrainController@index')->name('strains.index');
Route::get('/strains/{uuid}', 'StrainController@show')->name('strains.show');

// Cart
Route::post('/cart', 'CartController@create');

///////////////    DANGER ZONE    !!    Admin Routes    !!    /////////////////////////////////////
Route::prefix('/admin/')->name('admin.')->middleware('role:admin')->group( function () {

    Route::get('/strains/create', 'Admin\StrainController@create')->name('strains.create');
    Route::get('/strains/', 'Admin\StrainController@index')->name('strains.index');
    Route::get('strains/{id}', 'Admin\StrainController@edit')->name('strains.edit');
    Route::post('strains/', 'Admin\StrainController@store')->name('strains.store');
    Route::post('strains/{id}', 'Admin\StrainController@update')->name('strains.update');
    Route::get('strains/destroy/{id}', 'Admin\StrainController@destroy')->name('strains.delete');
});
////////////////   END   ADMIN   ROUTES   ///////////////////////////////////////////////////
