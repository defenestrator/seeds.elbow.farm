<?php

namespace Heisen;

use Heisen\BaseModel;

class Cart extends BaseModel
{
    protected $guarded = [];

    public function seedPacks()
    {
        return $this->belongsToMany(SeedPack::class);
    }
}
