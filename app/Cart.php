<?php

namespace Heisen;

use Heisen\BaseModel;

/**
 * Heisen\Cart
 *
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Heisen\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Cart whereUuid($value)
 * @mixin \Eloquent
 */
class Cart extends BaseModel
{
    protected $guarded = [];

    public function seedPacks()
    {
        return $this->belongsToMany(SeedPack::class);
    }
}
