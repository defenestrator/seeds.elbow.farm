<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\Payments
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $uuid
 * @property int $invoice_id
 * @property int $payment_method_id
 * @property string|null $customer_notes
 * @property int $amount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Payments whereUuid($value)
 */
class Payments extends Model
{
    //
}
