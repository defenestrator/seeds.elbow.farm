<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereName($value)
 * @mixin \Eloquent
 * @property string|null $uuid
 * @property string|null $notes
 * @property string|null $account
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\PaymentMethod whereUuid($value)
 */
class PaymentMethod extends BaseModel
{
    protected $fillable = [
        'name',
        'account',
        'uuid',
        'notes',
        'active',
        'image'
    ];

    protected $hidden = ['account'];
        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
