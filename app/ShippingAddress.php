<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'address_1', 'address_2', 'city', 'state', 'postcode', 'country', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
