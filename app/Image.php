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

    public function scopeFromFile($file)
    {
        $thumb = 640;
        $small = 200;
        $large = 1280;
        $smallImage = $this->processImage($file, $small);

        $thumbImage = $this->processImage($file, $thumb);

        $largeImage = $this->processImage($file, $large);

        $record = self::create([
            'small' => $smallImage,
            'thumb' => $thumbImage,
            'large' => $largeImage,
        ]);

        return $record;
    }

    /**
     * processImage
     *
     * @param  mixed $image
     * @param  mixed $size
     *
     * @return void
     */
    public function processImage($image, $size)
    {
        $options = [
            'visibility'            =>  'public',
            'Cache-Control' =>  'max-age=31536000',
            'Expires'       =>  now('America/Denver')->addRealDecade()->format('D, d M Y H:i:s T')
        ];

        $resize = Intervention::make($image)
            ->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 70)->stream();
        $hash = md5($resize->__toString());

        if ( config('app.env') == 'production' ) {

            Storage::disk('s3')
            ->getDriver()
            ->put('/images/'.$hash.'.jpg' , $resize->__toString(), $options);

            $filePath=  'http://i.heisenbeans.com/images/'.$hash.'.jpg';

        } else {

            Storage::disk('local')
            ->put('/public/images/'.$hash.'.jpg' , $resize->__toString());

            $filePath = Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $filePath;
    }
}
