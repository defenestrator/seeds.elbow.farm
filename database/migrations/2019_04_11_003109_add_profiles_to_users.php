<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Heisen\User;
use Heisen\Profile;

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

        for ($i = 0; $i <= $userCount; function(){
            Profile::create([
                'user_id' => $user->id,
                'avatar' => 'http://i.heisenbeans.com/images/heisenhead.png',
                'riu_username' => 'Uncle Buck',
                'user_title' => 'Seed Addict',
                'instagram_handle' => 'myspacetom',
                'facebook_url' => 'myspacetom',
                'chuckers_paradise' => 'Uncle Buck',
                'public' => false
            ]);
        });
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
