<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\ShippingAddress
 *
 * @property int $id
 * @property string $ship_to_name
 * @property int $user_id
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $postcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Heisen\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereShipToName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\ShippingAddress whereUserId($value)
 * @mixin \Eloquent
 */
class ShippingAddress extends Model
{
    protected $fillable = [
       'ship_to_name', 'address_1', 'address_2', 'city', 'state', 'postcode', 'country', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
