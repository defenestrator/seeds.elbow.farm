<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Seeds\CartSeedPack
 *
 * @property int $cart_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\CartSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\CartSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\CartSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\CartSeedPack whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\CartSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\CartSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class CartSeedPack extends Pivot
{
    //
}
