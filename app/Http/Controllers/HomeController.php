<?php

namespace Cheeba\Http\Controllers;

use Illuminate\Http\Request;
use Cheeba\Profile;
use Cheeba\User;
use Cheeba\Invoice;
use Auth;
use Cheeba\ShippingAddress;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Profile $profile, Invoice $invoice, ShippingAddress $shippingAddress)
    {
        $user = $user->whereId(Auth::user()->id)->first();
        $profile = $profile->whereUserId($user->id)->first();
        if ($invoice->whereUserId(Auth::user()->id)->exists()) {
            $invoices = $invoice->whereUserId(Auth::user()->id)->get();
        }
        $addresses = $shippingAddress->whereUserId($user->id)->get();
        return view('home', compact('user', 'profile', 'addresses'));
    }
}
