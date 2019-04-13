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
            $strains = $this->strain
            ->where('published', '=', true)
            ->with(['breeder', 'seedPacks', 'images'])
            ->orderBy('updated_at', 'desc')
            ->get();

            $strains->map( function($value) {
                $value->quantity = 1;
                return $value;
            });

            return $strains;

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
            $strain = $this->strain
                ->with(['breeder', 'images', 'seedPacks'])
                ->whereUuid($uuid)
                ->first();

            $strain->quantity = 1;
            $strain->feminized = "feminized";

            Cache::put('strain:'. $uuid, $strain, 666);
        }

        return view('strains.show', ['product' => $strain]);
    }
}
