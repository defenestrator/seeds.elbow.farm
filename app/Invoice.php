<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable [
        'total',
        'user_id',
        'payment_type_id',
        'status',
    ];
}
