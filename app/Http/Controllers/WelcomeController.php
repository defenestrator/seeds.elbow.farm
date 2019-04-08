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
        $posts = [];

        if (config('app.env') === 'production') {
            try {
                $posts = $this->instagram->media();
            } catch(Exception $e) {
                Log::alert('Failed to retrieve IG posts');
            }

        }

        $strains = Cache::remember('welcomeStrains', 66666, function() {
            $strains = $this->strain
            ->where('published', '=', true)
            ->with(['breeder', 'seedPacks', 'images'])
            ->orderBy('s1', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();

            $strains->map( function($strain) {
                $strain->quantity = 1;
                return $strain;
            });
            return $strains;
        });



        return view('welcome', compact('posts', 'strains'));
    }
}
