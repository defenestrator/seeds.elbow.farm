<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;
use Heisen\Strain;
use Cache;

class WelcomeController extends Controller
{
    protected $token = '';
    protected $instagram = null;
    protected $strain;
    /**
     * WelcomeController constructor.
     */
    public function __construct(Strain $strain)
    {
        $this->strain = $strain;
        $this->token = config('app.instagram_token');
        $this->instagram = new Instagram($this->token);
    }

    public function index()
    {
        $result = Cache::remember('strains', 60, function() {
            return $this->strain->where('published', '=', true)->orderBy('updated_at', 'desc')->get();
        });
        $strains = $result->map( function($value) {
            $value->selectedPack = 6;
            return $value;
        });

        $posts = $this->instagram->media();
        return view('welcome', compact('posts', 'strains'));
    }
}
