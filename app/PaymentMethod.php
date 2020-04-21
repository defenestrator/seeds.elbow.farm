<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereName($value)
 * @mixin \Eloquent
 * @property string|null $uuid
 * @property string|null $notes
 * @property string|null $account
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\PaymentMethod whereUuid($value)
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
