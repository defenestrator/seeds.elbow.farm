<?php

namespace Seeds\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Seeds\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
}
