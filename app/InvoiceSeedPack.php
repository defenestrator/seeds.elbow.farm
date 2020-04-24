<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Shoreline\InvoiceSeedPack
 *
 * @property int $invoice_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\InvoiceSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\InvoiceSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\InvoiceSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\InvoiceSeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\InvoiceSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\InvoiceSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class InvoiceSeedPack extends Pivot
{
    //
}
