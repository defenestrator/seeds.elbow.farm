<?php

namespace Heisen\Http\Controllers;

use Heisen\Http\Requests\ImageRequest;
use Heisen\Image;

class ImageController extends Controller
{

    protected $request;
    protected $filePaths;
    public function __construct(ImageRequest $request)
    {
        $this->request = $request;
        if ($this->request->hasFile('image') && $this->request->file('image'->isValid())) {

            $model = [
                'imageable_type' => $request->imageable_type,
                'imageable_id' => $request->imageable_id
            ];

            $this->filePaths = array_merge($this->generateImages($this->request->file('image')), $model);

        }
    }

    public function create()
    {
        if($this->filePaths !== null) {
            return Image::create($this->filePaths);
        }
        return response('Error', 422, ['error' => 'Unprocessable Entity, this probably means the file you uploaded is corrupt or an unsupported file type.']);
    }

}
