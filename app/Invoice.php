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
 * @property string|null $uuid
 * @property string|null $customer_notes
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereUuid($value)
 * @property int $shipping
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereShipping($value)
 * @property string $status
 * @property string|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\Heisen\SeedPack[] $seedPacks
 * @property-read \Heisen\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Invoice whereStatus($value)
 */
class Invoice extends BaseModel
{
    protected $guarded = [];

    public function seedPacks()
    {
        return $this->belongsToMany(SeedPack::class)
                    ->using(InvoiceSeedPack::class)
                    ->withPivot([
                        'quantity'
                    ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAdddress::class);
    }
}
