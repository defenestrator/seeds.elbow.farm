<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\ShippingAddress
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
 * @property-read \Cheeba\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereShipToName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\ShippingAddress whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Cheeba\User $user
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
