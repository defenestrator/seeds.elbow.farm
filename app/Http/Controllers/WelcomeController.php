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
        $results = Cache::remember('strains', 60, function() {
            return $this->strain->with(['breeder', 'seedPacks'])->where('published', '=', true)->orderBy('updated_at', 'desc')->get();
        });
        $strains = $results->map( function($value) {
                $value->price = 60;
                $value->perPack = 6;
                $value->quantity = 1;
                return $value;
            });

        $posts = [];

        if (config('app.env') === 'production' && config('app.url') === 'https://heisenbeans.com') {
            $posts = $this->instagram->media();
        }

        return view('welcome', compact('posts', 'strains'));
    }
}
