<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereName($value)
 * @mixin \Eloquent
 * @property string|null $uuid
 * @property string|null $notes
 * @property string|null $account
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\PaymentMethod whereUuid($value)
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
