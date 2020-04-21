<?php

namespace Cheeba;

use Cheeba\BaseModel;

/**
 * Cheeba\Cart
 *
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cheeba\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Cart whereUuid($value)
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
