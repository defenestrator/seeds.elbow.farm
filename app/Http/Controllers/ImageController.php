<?php

namespace Cheeba\Http\Controllers;

use Cheeba\Http\Requests\ImageRequest;
use Cheeba\Image;

class ImageController extends Controller
{

    public function create(ImageRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid() ) {

            $model = [
                'imageable_type' => $request->imageable_type,
                'imageable_id' => $request->imageable_id
            ];

            $filePaths = array_merge($this->generateImages($request->file('image')), $model);

            return Image::create($filePaths);
        }

        return response('Error', 422, ['error' => 'Unprocessable Entity, this probably means the file you uploaded is corrupt or an unsupported file type.']);
    }

}
