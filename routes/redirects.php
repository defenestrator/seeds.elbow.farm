<?php
use Illuminate\Support\Facades\Route;
/*
/ REDIRECT ROUTES
*/

Route::get('/strains/{id}', 'StrainController@show')->name('old.strains.show');


