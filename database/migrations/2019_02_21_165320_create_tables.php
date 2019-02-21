<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('testers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email_address');
            $table->string('message');
            $table->string('journal_link')->nullable();
            $table->string('country')->default('Void');
            $table->string('state')->default('XX');
            $table->string('city')->default('Not a Place');
            $table->string('address_1')->default('1234 No Such place');
            $table->string('address_2')->nullable();
            $table->string('postcode')->nullable();
            $table->timestamps();
        });

        Schema::create('breeders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->default('/i/heisenhead.png');
            $table->timestamps();
        });

        Schema::create('strains', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seed_pack_id')->default(1);
            $table->unsignedInteger('breeder_id')->default(1);
            $table->unsignedInteger('image_id')->nullable();
            $table->string('name');
            $table->string('image')->default('i.heisenbeans.com/images/heisenhead.png');
            $table->longText('genetics')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('feminized')->default(false);
            $table->boolean('published')->default(false);
            $table->unsignedInteger('flowering_time_min_weeks')->default(9);
            $table->unsignedInteger('flowering_time_max_weeks')->default(9);
            $table->timestamps();
        });

        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0);
            $table->string('ship_to_name')->default('Gary Goodson');
            $table->string('address_1')->default('1234 No Such place');
            $table->string('address_2')->default('Suite 0');
            $table->string('city')->default('Not a Place');
            $table->string('state')->default('XX');
            $table->string('country')->default('Void');
            $table->string('postcode')->default('00000-0000');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('large');
            $table->text('small');
            $table->text('thumb');
            $table->timestamps();
        });

        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedInteger('permission_id');

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type', ]);

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(['permission_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedInteger('role_id');

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type', ]);

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['role_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);

            app('cache')->forget('spatie.permission.cache');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        Schema::create('seed_packs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('strain_id');
            $table->date('available_since')->default(now('America/Denver'));
            $table->unsignedInteger('qty_per_pack')->default(12);
            $table->unsignedInteger('price')->default(100);
            $table->unsignedInteger('inventory')->default(0);
            $table->timestamps();
        });

        DB::unprepared(File::get('database/sql/perms-and-roles.sql'));
        DB::unprepared(File::get('database/sql/model_has_permissions.sql'));
        DB::unprepared(File::get('database/sql/model-has-role.sql'));
        DB::unprepared(File::get('database/sql/prod_heisen_2019-02-21-10-40.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('testers');
        Schema::dropIfExists('breeders');
        Schema::dropIfExists('strains');
        Schema::dropIfExists('shipping_addresses');
        Schema::dropIfExists('seed_types');
        Schema::dropIfExists('images');
        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('seed_packs');
    }
}
