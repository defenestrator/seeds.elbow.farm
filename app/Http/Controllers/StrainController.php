<?php
namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Strain;
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
        $strains = Cache::remember('strains', 60, function() {
            return $this->strain->where('published', '=', true)->with(['breeder'])->get()->toArray();
        });

        return view('strains',compact('strains'));
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function list() {
        return view('strains.list', ['content' => $this->strain->with(['breeder'])->get()]);
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
    public function store(Request $request)
    {

        $request->validate([
            'name'                      => 'required|min:2|max:140',
            'image'                     => 'required|image',
            'description'               => 'min:20|max:1400'
        ]);

        $image = $this->generateImages($request->image);

        $fem = false;
        $published = false;

        if ( $request->feminized == 'on' ) {
            $fem = true;
        }

        if ( $request->published == 'on' ) {
            $published = true;
        }

        $newStrain = $this->strain->create([
            'breeder_id'                => 1,
            'feminized'                 => $fem,
            'flowering_time_min_weeks'  => $request->min_flowering_time,
            'flowering_time_max_weeks'  => $request->max_flowering_time,
            'description'               => $request->description,
            'name'                      => $request->name,
            'image'                     => $image['large'],
            'image_id'                      => $image['id'],
            'qty_per_pack'              => 12,
            'published'                 => $published
        ]);
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
        $strain = $this->strain->whereId($id);

        return view('strains.show', ['strain' => $strain]);
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
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'image'                     => 'image',
        //     'name'                      => 'required|min:2|max:140',
        //     'retail_price'              => 'required',
        //     'description'               => 'min:2|max:1500'
        // ]);

        $strain = $this->strain->find($id);

        $image = $strain->image;
        $imageId = $strain->id;

        if ($request->image) {
            $images  = $this->generateImages($request->image);
            $image   = $images['large'];
            $imageId = $images['id'];
        }

        $fem = false;

        $published = false;

        if($request->feminized == 'on') {
            $fem = true;
        }

        if ( $request->published == 'on' ) {
            $published = true;
        }

        $new = $strain->update([
            'breeder_id'                => 1,
            'feminized'                 => $fem,
            'published'                 => $published,
            'flowering_time_min_weeks'  => $request->min_flowering_time,
            'flowering_time_max_weeks'  => $request->max_flowering_time,
            'description'               => $request->description,
            'name'                      => $request->name,
            'image'                     => $image,
            'image_id'                  => $imageId,
        ]);
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
        return redirect()->to(route('admin.strains.list'))->with(['message' => 'Killed!']);
    }
}
