<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Tester extends Model
{
    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'state',
        'city',
        'country',
        'postcode',
        'email_address',

        'message',
        'journal_link'
    ];
}
