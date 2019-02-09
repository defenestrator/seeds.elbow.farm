<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionsAndRolesRecordsToPermissionsAndRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $create_roles = [
            "php artisan permission:create-role admin",
            "php artisan permission:create-role customer",
            "php artisan permission:create-role vendor",
            "php artisan permission:create-role author",
            "php artisan permission:create-role publisher",
            "php artisan permission:create-role moderator",
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            //
        });
    }
}
