<?php

namespace Heisen;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail as VerifyEmail;

/**
 * Heisen\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Heisen\ShippingAddress[] $shippingAddresses
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use VerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shippingAddresses() {
        return $this->hasMany(ShippingAddress::class);
    }
}
