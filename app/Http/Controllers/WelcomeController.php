<?php

namespace Seeds\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;
use Seeds\Flower;
use Cache;

class WelcomeController extends Controller
{
    protected $flower;

    /**
     * WelcomeController constructor.
     * @param Flower $flower
     */
    public function __construct(Flower $flower)
    {
        $this->flower = $flower;
        $this->posts = [];
    }

    public function index()
    {
        $flowers = Cache::remember('welcomeFlowers', 66666, function() {
            $flowers = $this->flower
            ->where('published', '=', true)
            ->orderBy('updated_at', 'desc')
            ->get();

            $flowers->map( function($flower) {
                $flower->quantity = 1;
                return $flower;
            });
            return $flowers;
        });



        return view('welcome', ['posts' => $this->posts, 'flowers' => $flowers]);
    }
}
