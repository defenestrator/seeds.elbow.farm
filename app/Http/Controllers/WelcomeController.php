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
     * @param Strain $strain
     */
    public function __construct(Strain $strain)
    {
        $this->strain = $strain;
        $this->token = config('app.instagram_token');
        $this->instagram = new Instagram($this->token);
    }

    public function index()
    {
        $strains = Cache::remember('welcomeStrains', 60, function() {
            $strains = $this->strain
            ->where('published', '=', true)
            ->with(['breeder', 'seedPacks'])
            ->orderBy('s1', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();

            $strains->map( function($value) {
                $value->price = 60;
                $value->perPack = 6;
                $value->quantity = 1;
                return $value;
            });
            return $strains;
        });


        $posts = [];

        if (config('app.env') === 'production' && config('app.url') === 'https://heisenbeans.com') {
            $posts = $this->instagram->media();
        }

        return view('welcome', compact('posts', 'strains'));
    }
}
