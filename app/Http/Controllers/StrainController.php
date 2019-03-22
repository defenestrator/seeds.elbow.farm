<?php
namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Strain;
use Illuminate\Support\Facades\Cache;

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
        $result = Cache::remember('strains', 666, function() {
            return $this->strain->with(['seed_packs','breeder'])->where('published', '=', true)->orderBy('updated_at', 'desc')->get();
        });
        $strains = $result->map( function($value) {
            $value->selectedPack = 6;
            return $value;
        });
        return view('strains', compact('strains'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        if (Cache::has('strain:'. $uuid)) {
            $strain = Cache::get('strain:'. $uuid);
        } else {
            $strain = $this->strain->whereUuid($uuid)->first();
            $strain->feminized = "feminized";
            Cache::put('strain:'. $uuid, $strain, 666);
        }

        return view('strains.show', compact('strain'));
    }
}
