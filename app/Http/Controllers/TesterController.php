<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;

class TesterController extends Controller
{
    public function index() {
        return view('testers');
    }
}
