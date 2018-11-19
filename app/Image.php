<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Image
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image query()
 * @mixin \Eloquent
 */
class Image extends Model
{
    protected $fillable = ['thumb', 'large', 'small'];
}
