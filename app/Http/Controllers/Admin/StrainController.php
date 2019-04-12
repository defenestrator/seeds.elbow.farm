<?php

namespace Heisen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Heisen\Strain;
use Heisen\Http\Requests\StoreStrainRequest;
use Heisen\Http\Requests\UpdateStrainRequest;
use Illuminate\Support\Facades\Cache;
use Heisen\Image;


class StrainController extends AdminController
{
    protected $strain;
    protected $request;
    protected $filePaths;

    public function __construct(Strain $strain, Request $request)
    {
        $this->strain = $strain;
        $this->request = $request;
        if ($this->request->hasFile('image') && $this->request->file('image')->isValid()) {

            $model = [
                'imageable_type' => $request->imageable_type,
                'imageable_id' => $request->imageable_id
            ];

            $this->filePaths = array_merge($this->generateImages($this->request->file('image')), $model);

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('strains.list', ['content' => $this->strain->orderBy('updated_at', 'desc')->get()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('strains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStrainRequest $request)
    {
        if($this->filePaths !== null) {
            $image = Image::create($this->filePaths);

            $uuid = $this->strain->makeUuid();

            $s1 = $pub = false;

            if ( $request->published == 'on' ) {
                $pub = true;
            }

            if ( $request->s1 == 'on' ) {
                $s1 = true;
            }
            $newStrain = $this->strain->create([
                'breeder_id'                => 1,
                'uuid'                      => $uuid,
                'genetics'                  => $request->genetics,
                'flowering_time_min_weeks'  => $request->min_flowering_time,
                'flowering_time_max_weeks'  => $request->max_flowering_time,
                'description'               => $request->description,
                'name'                      => $request->name,
                'image'                     => $image->large,
                'image_id'                  => $image->id,
                's1'                        => $s1,
                'published'                 => $pub
            ]);
            Cache::forget('strains');
            Cache::forget('welcomeStrains');
            Cache::put('strain:'. $newStrain->id, $newStrain, 66666);

            return redirect()->to('/admin/strains/'. $newStrain->id);
        }

        return response('Error', 422, ['error' => 'Unprocessable Entity, this probably means the file you uploaded is corrupt or an unsupported file type.']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Cache::has('strain:'. $id)) {
           $strain = Cache::get('strain:'. $id);
        } else {
            $strain = $this->strain->whereId($id)->first();
            if ( $strain->feminized === 1 ) {
                   $strain->feminized = "feminized";
            } else {
                $strain->feminized = "regular";
            }
            Cache::put('strain:'. $id, $strain, 66666);
        }

        return view('strains.show', compact('strain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $strain = $this->strain->findOrFail($id);

        $s1Value = $femValue = $pubValue = '';

        if ($strain->feminized == 1) {
            $femValue = 'checked';
        }
        if ($strain->published == 1) {
            $pubValue = 'checked';
        }
        if ($strain->s1 == 1) {
            $s1Value = 'checked';
        }

        return view('strains.edit',
            [
                'strain' => $strain,
                'femValue' => $femValue,
                'pubValue' => $pubValue,
                's1Value' => $s1Value
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStrainRequest $request, $id)
    {
        $strain = $this->strain->find($id);

        if($this->filePaths !== null) {
            $image = Image::create($this->filePaths);
            $strain->image   = $image['large'];
            $strain->image_id = $image['id'];
        }

        $s1 = $pub = false;

        if ( $request->published == 'on' ) {
            $pub = true;
        }

        if ( $request->s1 == 'on' ) {
            $s1 = true;
        }

        $strain->update([
            'breeder_id'                => 1,
            'feminized'                 => true,
            'published'                 => $pub,
            's1'                        => $s1,
            'flowering_time_min_weeks'  => $request->min_flowering_time,
            'flowering_time_max_weeks'  => $request->max_flowering_time,
            'description'               => $request->description,
            'name'                      => $request->name,
            'genetics'                  => $request->genetics,
            'image'                     => $strain->image,
            'image_id'                  => $strain->imageId
        ]);
        Cache::forget('strains');
        Cache::forget('welcomeStrains');
        Cache::forget('strain:'. $strain->id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $damned = $this->strain->findOrFail($id);
        $damned->delete();
        Cache::forget('strains');
        Cache::forget('strain:'.$damned->id);
        return redirect()->to(route('admin.strains.index'))->with(['message' => 'Killed!']);
    }
}
