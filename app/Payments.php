<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\Payments
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Payments whereUuid($value)
 */
class Payments extends Model
{
    //
}
