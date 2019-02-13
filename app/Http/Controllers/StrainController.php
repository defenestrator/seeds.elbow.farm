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
        return view('strains.index', ['content' => $this->strain->with(['breeder'])->get()]);
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
            'name' => 'required|min:2|max:140',
            'image' => 'required|image',
            // 'slug' => 'required|unique:strains',
            'description' => 'min:2|max:1400'
        ]);

        $image = $this->header($request);
        $newStrain = $this->strain->new([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image->large,
            // 'slug' => $request->slug
        ]);
        $newStrain->save();
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
        return view('strains.edit', ['strain' => $this->strain->find($id)->first()]);
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
        $file = $request->image;
        $image = $this->header($file);
        return $this->save([
            'image' => $image,
            'description' => $request->description,
            'name' => $request->name
        ], $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
