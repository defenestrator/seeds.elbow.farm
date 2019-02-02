<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('create_roles_and_permissions', function() {
    $create_roles = [
        "php artisan permission:create-role admin",
        "php artisan permission:create-role customer",
        "php artisan permission:create-role vendor",
        "php artisan permission:create-role author",
        "php artisan permission:create-role publisher",
        "php artisan permission:create-role moderator",
        "php artisan permission:create-role god",
    ];

    $create_permissions = [
        "php artisan permission:create-permission create-breeder",
        "php artisan permission:create-permission edit-breeder",
        "php artisan permission:create-permission delete-breeder",

        "php artisan permission:create-permission create-image",
        "php artisan permission:create-permission edit-image",
        "php artisan permission:create-permission delete-image",

        "php artisan permission:create-permission create-seed-type",
        "php artisan permission:create-permission edit-seed-type",
        "php artisan permission:create-permission delete-seed-type",

        "php artisan permission:create-permission create-shipping-address",
        "php artisan permission:create-permission edit-shipping-address",
        "php artisan permission:create-permission delete-shipping-address",

        "php artisan permission:create-permission create-strain",
        "php artisan permission:create-permission edit-strain",
        "php artisan permission:create-permission delete-strain",

        "php artisan permission:create-permission edit-tester",
        "php artisan permission:create-permission create-tester",
        "php artisan permission:create-permission delete-tester",

        "php artisan permission:create-permission create-user",
        "php artisan permission:create-permission edit-user",
        "php artisan permission:create-permission delete-user",
    ];

    foreach($create_roles as $create_role) {
        exec($create_role);
    }

    foreach($create_permissions as $create_permission) {
        exec($create_permission);
    }
});

