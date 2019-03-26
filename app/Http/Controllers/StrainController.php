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

        $strains = Cache::remember('strains', 666, function() {
            $result= $this->strain
            ->where('published', '=', true)
            ->with(['breeder', 'seedPacks'])            
            ->orderBy('updated_at', 'desc')
            ->get();
            
            $result->map( function($value) {
                $value->price = 60;
                $value->perPack = 6;
                $value->quantity = 1;
                return $value;
            });
            $strains = $result->keyBy('uuid');
        
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
