<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class SeedType extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function strains()
    {
        return $this->hasMany(Strain::class);
    }
}
