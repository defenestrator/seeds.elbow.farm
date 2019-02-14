<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Strain;
use Cache;

class StrainController extends Controller
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
        $strains = Cache::remember('strains', 666, function() {
            return $this->strain->with(['breeder'])->get()->toArray();
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
            'retail_price'              => 'required|number|min:2',
            'flowering_time_min_weeks'  => 'number',
            'flowering_time_max_weeks'  => 'number',
            'description'               => 'min:2|max:1400'
        ]);

        $image = $this->header($request->image);
        $newStrain = $this->strain->create([
            'breeder_id'                => 1,
            'feminized'                 => $request->feminized,
            'retail_price'              => $request->retail_price,
            'flowering_time_min_weeks'  => $request->flowering_time_min_weeks,
            'flowering_time_max_weeks'  => $request->flowering_time_max_weeks,
            'description'               => $request->description,
            'name'                      => $request->name,
            'image'                     => $image['large'],
            // 'slug' => $request->slug
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('strains.edit', ['strain' => $this->strain->findOrFail($id)]);
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
        $request->validate([
            'name'                      => 'required|min:2|max:140',
            'image'                     => 'required|image',
            'retail_price'              => 'required|number|min:2',
            'flowering_time_min_weeks'  => 'number',
            'flowering_time_max_weeks'  => 'number',
            'description'               => 'min:2|max:1500'
        ]);

        $strain = $this->strain->find($id);
        if($request->image) {
            $image = $this->header($request->image);
            $strain->update([
                'image'                     => $image['large'],
                'breeder_id'                => 1,
                'feminized'                 => $request->feminized,
                'retail_price'              => $request->retail_price,
                'flowering_time_min_weeks'  => $request->flowering_time_min_weeks,
                'flowering_time_max_weeks'  => $request->flowering_time_max_weeks,
                'description'               => $request->description,
                'name'                      => $request->name
            ]);
            return back();
            }
        $strain->update([
            'breeder_id'                => 1,
            'feminized'                 => $request->feminized,
            'retail_price'              => $request->retail_price,
            'flowering_time_min_weeks'  => $request->flowering_time_min_weeks,
            'flowering_time_max_weeks'  => $request->flowering_time_max_weeks,
            'description'               => $request->description,
            'name'                      => $request->name
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
