<?php

namespace Seeds;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail as VerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

/**
 * Seeds\User
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\ShippingAddress[] $shippingAddresses
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User permission($permissions)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User role($roles, $guard = null)
 * @property string|null $uuid
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\Invoice[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\Payments[] $payments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\User whereUuid($value)
 * @property-read \Seeds\Profile $profile
 */
class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;
    use VerifyEmail;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function makeUuid()
    {
        $uuid ='';

        try {
            $uuid= Uuid::uuid1();
        } catch (UnsatisfiedDependencyException $e) {
            // Some dependency was not met. Either the method cannot be called on a
            // 32-bit system, or it can, but it relies on Moontoast\Math to be present.
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

        return $uuid->toString();
    }

    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payments::class, Invoice::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
