<?php

namespace Cheeba\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Cheeba\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
}
