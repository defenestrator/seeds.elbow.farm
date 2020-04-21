<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\Invoice
 *
 * @property int $id
 * @property int $user_id
 * @property int $payment_method_id
 * @property int $total
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $uuid
 * @property string|null $customer_notes
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereUuid($value)
 * @property int $shipping
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereShipping($value)
 * @property string $status
 * @property string|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cheeba\SeedPack[] $seedPacks
 * @property-read \Cheeba\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Invoice whereStatus($value)
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
