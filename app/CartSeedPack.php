<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Shoreline\CartSeedPack
 *
 * @property int $cart_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\CartSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\CartSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\CartSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\CartSeedPack whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\CartSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\CartSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class CartSeedPack extends Pivot
{
    //
}
