<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'avatar',
        'riu_username',
        'instagram',
        'facebook_url',
        'chuckers_paradise'
    ];
}
