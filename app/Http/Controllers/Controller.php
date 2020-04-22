<?php

namespace Cheeba\Http\Controllers;

use Cache;
use Cheeba\Image as ImageModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * generateImages
     *
     * @param  mixed $file
     *
     * @return array $filePaths
     */
    protected function generateImages($file)
    {
        $small = 200;
        $thumb = 640;
        $large = 1280;

        $smallImage = $this->processImage($file, $small);

        $thumbImage = $this->processImage($file, $thumb);

        $largeImage = $this->processImage($file, $large);

        $filePaths = [
            'small' => $smallImage,
            'thumb' => $thumbImage,
            'large' => $largeImage,
        ];

        return $filePaths;
    }

    /**
     * processImage
     *
     * @param  mixed $image
     * @param  mixed $size
     *
     * @return array $filePath
     */
    private function processImage($image, $size)
    {
        $options = [
            'visibility'            =>  'public',
            'Cache-Control' =>  'max-age=31536000',
            'Expires'       =>  now('America/Denver')->addRealDecade()->format('D, d M Y H:i:s T')
        ];

        $resize = Image::make($image)
            ->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 70)->stream();

        $hash = md5($resize->__toString());

        if ( config('app.env') == 'production' ) {
            Storage::disk('s3')->getDriver()->put('/images/'.$hash.'.jpg' , $resize->__toString(), $options);
            $filePath=  'https://s3-us-west-2.amazonaws.com/i.thecheebashack.com/images/'.$hash.'.jpg';
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $filePath = Storage::disk('local')->url('images/'.$hash.'.jpg');
        }

        return $filePath;
    }
}
