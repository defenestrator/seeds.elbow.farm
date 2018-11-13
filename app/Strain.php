<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
    protected $fillable = [
        'name', 'seed_type_id', 'image', 'genetics', 'description', 'breeder_id'
    ];

    public function breeders()
    {
        return $this->belongsTo(Breeder::class);
    }

    public function seed_types()
    {
        return $this->hasOne(SeedType::class);
    }
}
