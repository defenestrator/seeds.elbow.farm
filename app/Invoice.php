<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Invoice
 *
 * @property int $id
 * @property int $user_id
 * @property int $payment_method_id
 * @property int $total
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereUserId($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    protected $fillable = [
        'total',
        'user_id',
        'payment_type_id',
        'status',
    ];
}
