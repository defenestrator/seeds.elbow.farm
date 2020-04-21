<?php

namespace Cheeba\Http\Controllers;

use Cheeba\SeedPack;
use Illuminate\Http\Request;

class SeedPackController extends Controller
{
    protected $seedPack;

    public function __construct (SeedPack $seedPack)
    {
        $this->seedPack = $seedPack;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->seedPack()->with('strain')->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Cheeba\SeedPack  $seedPack
     * @return \Illuminate\Http\Response
     */
    public function show(SeedPack $seedPack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Cheeba\SeedPack  $seedPack
     * @return \Illuminate\Http\Response
     */
    public function edit(SeedPack $seedPack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Cheeba\SeedPack  $seedPack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeedPack $seedPack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Cheeba\SeedPack  $seedPack
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeedPack $seedPack)
    {
        //
    }
}
