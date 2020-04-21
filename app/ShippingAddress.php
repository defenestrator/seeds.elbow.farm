<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\ShippingAddress
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
 * @property-read \Seeds\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereShipToName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\ShippingAddress whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Seeds\User $user
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
