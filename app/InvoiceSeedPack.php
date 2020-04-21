<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Cheeba\InvoiceSeedPack
 *
 * @property int $invoice_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\InvoiceSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\InvoiceSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\InvoiceSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\InvoiceSeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\InvoiceSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\InvoiceSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class InvoiceSeedPack extends Pivot
{
    //
}
