<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Heisen\CartSeedPack
 *
 * @property int $cart_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\CartSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\CartSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\CartSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\CartSeedPack whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\CartSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\CartSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class CartSeedPack extends Pivot
{
    //
}
