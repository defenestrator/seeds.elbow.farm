<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\Invoice
 *
 * @property int $id
 * @property int $user_id
 * @property int $payment_method_id
 * @property int $total
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $uuid
 * @property string|null $customer_notes
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereUuid($value)
 * @property int $shipping
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereShipping($value)
 * @property string $status
 * @property string|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\SeedPack[] $seedPacks
 * @property-read \Seeds\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Invoice whereStatus($value)
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
