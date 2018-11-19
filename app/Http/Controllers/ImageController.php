<?php

namespace Heisen\Http\Controllers;

use Heisen\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public $options = ['visibility' => 'public', 'Cache-Control' => 'max-age=315360000'];

    public function create(Request $request)
    {
        $request->validate([
            'header_photo' => 'required|image'
        ]);

        $large = $this->large($request->file('header_photo'));
        $small = $this->small($request->file('header_photo'));
        $thumb = $this->thumb($request->file('header_photo'));

        $record = ImageModel::create([
            'small' => $small,
            'thumb' => $thumb,
            'large' => $large
        ]);
        return response()->json([
            'image_id' => $record->id,
            'small' => $small,
            'thumb' => $thumb,
            'large' => $large,
            'success' => true,
        ]);
    }

    private function large($image)
    {
        $resize = Image::make($image)
            ->resize(1280, 1280, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 70)->stream();
        $hash = md5($resize->__toString());

        if (config('app.env') == 'production') {
            Storage::disk('s3')->put('/images/'.$hash.'.jpg' , $resize->__toString(), $this->options);
            $location =  Storage::disk('s3')->url('images/'.$hash.'.jpg');
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $location =  Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $location;
    }

    private function small($img)
    {
        $resize = Image::make($img)
            ->resize(640, 640, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 75)->stream();
        $hash = md5($resize->__toString());
        if (config('app.env') == 'production') {
            Storage::disk('s3')->put('/images/'.$hash.'.jpg' , $resize->__toString(), $this->options);
            $location =  Storage::disk('s3')->url('images/'.$hash.'.jpg');
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $location =  Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $location;
    }

    public function thumb($img)
    {
        $resize = Image::make($img)
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80);
        $hash = md5($resize->__toString());
        if (config('app.env') == 'production') {
            Storage::disk('cloud')->put('/images/'.$hash.'.jpg' , $resize->__toString(), $this->options);
            $location =  Storage::disk('s3')->url('images/'.$hash.'.jpg');
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $location =  Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $location;
    }
}
