<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;
use Intervention;
use Illuminate\Support\Facades\Storage;

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
 * @property string|null $imageable_type
 * @property int|null $imageable_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image fromFile()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Image whereImageableType($value)
 */
class Image extends Model
{
    protected $fillable = ['thumb', 'large', 'small', 'imageable_type', 'imageable_id'];


    public function imageable()
    {
        return $this->morphTo();
    }

}
