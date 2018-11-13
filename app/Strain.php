<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
    protected $fillable = [
        'name', 'image', 'genetics', 'description', 'breeder_id'
    ];

    public function breeders()
    {
        return $this->belongsTo(Breeder::class);
    }
}
