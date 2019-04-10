<?php

namespace Heisen\Http\Controllers\Admin;

use Heisen\Image as ImageModel;
use Intervention\Image\Facades\Image;
use Heisen\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends \Heisen\Http\Controllers\Controller
{
    public function __construct()
    {

    }

    protected $options = [
        'visibility'            =>  'public',
        'Cache-Control' =>  'max-age=31536000'
    ];

    protected $small = 200;
    protected $thumb = 640;
    protected $large = 1280;

    /**
     * wysiwygImageUpload
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function wysiwygImageUpload(ImageRequest $request)
    {

        $large = $this->processImage($request->image, $this->large);

        return response()->json([
            'large' => $large,
            'success' => true,
        ]);
    }

    /**
     * generateImages
     *
     * @param  mixed $file
     *
     * @return void
     */
    public function generateImages($file)
    {
        $smallImage = $this->processImage($file, $this->small);

        $thumbImage = $this->processImage($file, $this->thumb);

        $largeImage = $this->processImage($file, $this->large);

        $record = ImageModel::create([
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
        $resize = Image::make($image)
            ->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 70)->stream();
        $hash = md5($resize->__toString());

        if ( config('app.env') == 'production' ) {
            Storage::disk('s3')->put('/images/'.$hash.'.jpg' , $resize->__toString(), $this->options);
            $filePath=  'http://i.heisenbeans.com/images/'.$hash.'.jpg';
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $filePath = Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $filePath;
    }
}
