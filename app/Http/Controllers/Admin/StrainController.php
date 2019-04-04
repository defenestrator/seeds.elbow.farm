<?php

namespace Heisen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Heisen\Strain;
use Heisen\Http\Requests\StrainRequest;
use Illuminate\Support\Facades\Cache;

class StrainController extends ImageController
{
    protected $strain;

    public function __construct (Strain $strain)
    {
        $this->strain = $strain;
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
    public function store(StrainRequest $request)
    {
        $image = $this->generateImages($request->image);

        if ( $request->published == 'on' ) {
            $pub = true;
        }

        $newStrain = $this->strain->create([
            'breeder_id'                => 1,
            'feminized'                 => true,
            'flowering_time_min_weeks'  => $request->min_flowering_time,
            'flowering_time_max_weeks'  => $request->max_flowering_time,
            'description'               => $request->description,
            'name'                      => $request->name,
            'image'                     => $image['large'],
            'image_id'                  => $image['id'],
            'published'                 => $pub
        ]);
        Cache::forget('strains');
        Cache::put('strain:'. $newStrain->id, $newStrain, 666);
        return redirect()->to('/admin/strains/'. $newStrain->id);
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
            Cache::put('strain:'. $id, $strain, 666);
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

        $femValue = $pubValue = '';

        if ($strain->feminized == 1) {
            $femValue = 'checked';
        }
        if ($strain->published == 1) {
            $pubValue = 'checked';
        }
        return view('strains.edit', ['strain' => $strain, 'femValue' => $femValue, 'pubValue' => $pubValue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StrainRequest $request, $id)
    {
        $strain = $this->strain->find($id);

        $image = $strain->image;

        $imageId = $strain->id;

        if ($request->image) {
            $images  = $this->generateImages($request->image);
            $image   = $images['large'];
            $imageId = $images['id'];
        }

        $fem = false;
        $pub = false;

        if($request->feminized == 'on') {
            $fem = true;
        }

        if ( $request->published == 'on' ) {
            $pub = true;
        }

        $new = $strain->update([
            'breeder_id'                => 1,
            'feminized'                 => $fem,
            'published'                 => $pub,
            'flowering_time_min_weeks'  => $request->min_flowering_time,
            'flowering_time_max_weeks'  => $request->max_flowering_time,
            'description'               => $request->description,
            'name'                      => $request->name,
            'genetics'                  => $request->genetics,
            'image'                     => $image,
            'image_id'                  => $imageId,
        ]);
        Cache::forget('strains');
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
        return redirect()->to(route('admin.strains.list'))->with(['message' => 'Killed!']);
    }
}
