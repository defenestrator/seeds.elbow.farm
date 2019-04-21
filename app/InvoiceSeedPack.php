<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Heisen\InvoiceSeedPack
 *
 * @property int $invoice_id
 * @property int $seed_pack_id
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\InvoiceSeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\InvoiceSeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\InvoiceSeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\InvoiceSeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\InvoiceSeedPack whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\InvoiceSeedPack whereSeedPackId($value)
 * @mixin \Eloquent
 */
class InvoiceSeedPack extends Pivot
{
    //
}
