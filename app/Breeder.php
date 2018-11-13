<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    protected $fillable = [
        'name', 'image', 'description'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}