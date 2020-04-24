<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\Invoice
 *
 * @property int $id
 * @property int $user_id
 * @property int $payment_method_id
 * @property int $total
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $uuid
 * @property string|null $customer_notes
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereUuid($value)
 * @property int $shipping
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereShipping($value)
 * @property string $status
 * @property string|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\Shoreline\SeedPack[] $seedPacks
 * @property-read \Shoreline\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Invoice whereStatus($value)
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
