<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Image
 *
 * @property int $id
 * @property string|null $large
 * @property string|null $small
 * @property string|null $thumb
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereLarge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereSmall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    protected $fillable = ['thumbnail', 'large', 'stamp'];
}
