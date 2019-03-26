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
            $results = $this->strain->where('published', '=', true)
            ->select('name', 'description', 'uuid', 'image','feminized', 's1','flowering_time_max_weeks','flowering_time_min_weeks','published',)
            ->orderBy('updated_at', 'desc')->keyBy('uuid');
            ->get();
            
            $strains = $results->map( function($value) {
                $value->breeder = $value->breeder->name;
                $value->price = 60;
                $value->perPack = 6;
                $value->quantity = 1;
                return $value;
            });
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
