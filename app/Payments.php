<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\Payments
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Payments whereUuid($value)
 */
class Payments extends Model
{
    //
}
