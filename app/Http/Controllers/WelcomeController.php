<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class WelcomeController extends Controller
{
    protected $token = '';
    protected $instagram = null;

    /**
     * WelcomeController constructor.
     */
    public function __construct()
    {
        $this->token = config('app.instagram_token');
        $this->instagram = new Instagram($this->token);
    }

    public function index() {
        $posts = $this->instagram->media();
        return view('welcome', compact('posts'));
    }
}
