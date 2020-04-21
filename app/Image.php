<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;
use Intervention;
use Illuminate\Support\Facades\Storage;

/**
 * Seeds\Image
 *
 * @property int $id
 * @property string|null $large
 * @property string|null $small
 * @property string|null $thumb
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereLarge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereSmall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $imageable_type
 * @property int|null $imageable_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image fromFile()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Image whereImageableType($value)
 */
class Image extends Model
{
    protected $fillable = ['thumb', 'large', 'small', 'imageable_type', 'imageable_id'];


    public function imageable()
    {
        return $this->morphTo();
    }

}
