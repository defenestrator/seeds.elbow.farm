<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Cheeba\CartSeedPack
 *
 * @property int $cart_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\CartSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\CartSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\CartSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\CartSeedPack whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\CartSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\CartSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class CartSeedPack extends Pivot
{
    //
}
