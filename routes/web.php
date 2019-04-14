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
Route::post('/cart', 'CartController@store')->name('cart.create');
Route::put('/cart', 'CartController@update')->name('cart.update');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart', 'CartController@show')->name('cart.edit');

Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::put('profile/', 'ProfileController@update')->name('profile.update');

Route::post('image/', 'ImageController@create')->name('image.create');
/////////////////   USER ROUTES     !!///////////////////////////////////////////////////////
Route::prefix('/user/')->name('user.')->group( function(){
    Route::put('/{id}', 'UserController@update')->name('update');
    Route::get('/profile/{user_id}', 'ProfileController@show')->name('profile.show');
    Route::get('invoices/', 'InvoiceController@index')->name('invoices.index');
    Route::get('shipping_addresses/', 'ShippingAddressController@index')->name('shipping_addresses.index');
});


/////////////////////////////////////////////////////////////////////////////////////////////
///////////////    DANGER ZONE    !!    Admin Routes    !!    ///////////////////////////////
Route::prefix('/admin/')->name('admin.')->middleware('role:admin')->group( function () {

    Route::get('strains/create', 'Admin\StrainController@create')->name('strains.create');
    Route::get('strains/', 'Admin\StrainController@index')->name('strains.index');
    Route::get('strains/{id}', 'Admin\StrainController@edit')->name('strains.edit');
    Route::post('strains/', 'Admin\StrainController@store')->name('strains.store');
    Route::post('strains/{id}', 'Admin\StrainController@update')->name('strains.update');
    Route::get('strains/destroy/{id}', 'Admin\StrainController@destroy')->name('strains.delete');

    Route::get('seed_packs/create', 'Admin\SeedPackController@create')->name('seed_packs.create');
    Route::get('seed_packs/', 'Admin\SeedPackController@index')->name('seed_packs.index');
    Route::get('seed_packs/{id}', 'Admin\SeedPackController@edit')->name('seed_packs.edit');
    Route::post('seed_packs/', 'Admin\SeedPackController@store')->name('seed_packs.store');
    Route::post('seed_packs/{id}', 'Admin\SeedPackController@update')->name('seed_packs.update');
    Route::get('seed_packs/destroy/{id}', 'Admin\SeedPackController@destroy')->name('seed_packs.delete');


});
////////////////   END   ADMIN   ROUTES   ///////////////////////////////////////////////////
