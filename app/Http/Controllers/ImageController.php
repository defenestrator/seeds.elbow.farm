<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    public $options = [
        'visibility'    => 'public',
        'Cache-Control' => 'max-age=31536000'
    ];

    /**
     * wysiwygImageUpload
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function wysiwygImageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
        ]);

        $large = $this->largeImage($request->image);

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
        try {

            $thumb = $this->thumbImage($file);
            $small = $this->smallImage($file);
            $large = $this->largeImage($file);

            $record = ImageModel::create([
                'thumb' => $thumb,
                'small' => $small,
                'large' => $large
            ]);

            return [
                'image_id' => $record->id,
                'thumb' => $thumb,
                'small' => $small,
                'large' => $large,
                'success' => true,
            ];
        } catch (Exception $e) {
            Log::error('Creation of ImageModel record failed.');
        }
    }


    /**
     * largeImage
     *
     * @param  mixed $image
     *
     * @return void
     */
    public function largeImage($image)
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

    /**
     * thumbImage
     *
     * @param  mixed $img
     *
     * @return void
     */
    public function thumbImage($img)
    {
        $resize = Image::make($img)
            ->resize(575, 575, function ($constraint) {
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

    /**
     * smallImage
     *
     * @param  mixed $img
     *
     * @return void
     */
    public function smallImage($img)
    {
        $resize = Image::make($img)
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80);
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
}
