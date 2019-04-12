<?php

namespace Heisen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Heisen\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
}
