<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\ShippingAddress
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
 * @property-read \Shoreline\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereShipToName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\ShippingAddress whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Shoreline\User $user
 */
class ShippingAddress extends Model
{
    protected $fillable = [
       'ship_to_name', 'address_1', 'address_2', 'city', 'state', 'postcode', 'country', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
