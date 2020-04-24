<?php

namespace Shoreline\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Shoreline\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
}
