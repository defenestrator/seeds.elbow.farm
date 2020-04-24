<?php

namespace Shoreline;

use Shoreline\BaseModel;

/**
 * Shoreline\Cart
 *
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Shoreline\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Cart whereUuid($value)
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
