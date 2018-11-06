<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;

class StrainController extends Controller
{
    public function index() {
        return view('strains');
    }
}
