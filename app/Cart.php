<?php

namespace Seeds;

use Seeds\BaseModel;

/**
 * Seeds\Cart
 *
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Cart whereUuid($value)
 * @mixin \Eloquent
 */
class Cart extends BaseModel
{
    protected $guarded = [];

    public function seedPacks()
    {
        return $this->belongsToMany(SeedPack::class)
                            ->using(CartSeedPack::class)
                            ->withPivot([
                                'quantity'
                            ]);
    }
}
