<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Shoreline\User;
use Shoreline\Profile;

class AddProfilesToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $userCount = User::count();

        for ($i = 1; $i < $userCount;) {
            Profile::create([
                'user_id' => $i,
                'avatar' => 'http://picusm.photos/640',
                'riu_username' => 'Uncle Buck',
                'user_title' => 'Seed Addict',
                'instagram_handle' => 'myspacetom',
                'facebook_url' => 'myspacetom',
                'chuckers_paradise' => 'Uncle Buck',
                'public' => false
            ]);
            $i++;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
