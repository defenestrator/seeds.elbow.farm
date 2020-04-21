<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Seeds\InvoiceSeedPack
 *
 * @property int $invoice_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\InvoiceSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\InvoiceSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\InvoiceSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\InvoiceSeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\InvoiceSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\InvoiceSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class InvoiceSeedPack extends Pivot
{
    //
}
