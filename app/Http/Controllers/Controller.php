<?php

namespace Heisen\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Heisen\Image as ImageModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $options = ['visibility' => 'public', 'Cache-Control' => 'max-age=315360000'];

    public function wysiwyg(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
        ]);

        $large = $this->large($request->image);

        return response()->json([
            'large' => $large,
            'success' => true,
        ]);
    }

    public function header($file)
    {
        $large = $this->large($file);
        $thumb = $this->thumb($file);
        $small = $this->small($file);

        $record = ImageModel::create([
            'thumb' => $thumb,
            'small' => $small,
            'large' => $large
        ]);
        return response()->json([
            'image_id' => $record->id,
            'thumb' => $thumb,
            'small' => $small,
            'large' => $large,
            'success' => true,
        ]);
    }

    public function large($image)
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

    public function thumb($img)
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

    public function small($img)
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

    public $provinces = array(0 => 'Alberta',
        1 => 'British Columbia',
        2 => 'Manitoba',
        3 => 'New Brunswick',
        4 => 'Newfoundland and Labrador',
        5 => 'Northwest Territories',
        6 => 'Nova Scotia',
        7 => 'Nunavut',
        8 => 'Ontario',
        9 => 'Prince Edward Island',
        10 => 'Québec',
        11 => 'Saskatchewan',
        12 => 'Yukon');

    public $states = array(0 => 'Alabama',
            1 => 'Alaska',
            2 => 'Arizona',
            3 => 'Arkansas',
            4 => 'California',
            5 => 'Colorado',
            6 => 'Connecticut',
            7 => 'Delaware',
            8 => 'Florida',
            9 => 'Georgia',
            10 => 'Hawaii',
            11 => 'Idaho',
            12 => 'Illinois',
            13 => 'Indiana',
            14 => 'Iowa',
            15 => 'Kansas',
            16 => 'Kentucky',
            17 => 'Louisiana',
            18 => 'Maine',
            19 => 'Maryland',
            20 => 'Massachusetts',
            21 => 'Michigan',
            22 => 'Minnesota',
            23 => 'Mississippi',
            24 => 'Missouri',
            25 => 'Montana',
            26 => 'Nebraska',
            27 => 'Nevada',
            28 => 'New Hampshire',
            29 => 'New Jersey',
            30 => 'New Mexico',
            31 => 'New York',
            32 => 'North Carolina',
            33 => 'North Dakota',
            34 => 'Ohio',
            35 => 'Oklahoma',
            36 => 'Oregon',
            37 => 'Pennsylvania',
            38 => 'Rhode Island',
            39 => 'South Carolina',
            40 => 'South Dakota',
            41 => 'Tennessee',
            42 => 'Texas',
            43 => 'Utah',
            44 => 'Vermont',
            45 => 'Virginia',
            46 => 'Washington',
            47 => 'West Virginia',
            48 => 'Wisconsin',
            49 => 'Wyoming');

}
