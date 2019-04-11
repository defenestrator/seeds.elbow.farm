<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Profile;
use Heisen\User;
use Heisen\Invoice;
use Auth;
use Heisen\ShippingAddress;

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

        $profile = $profile->whereUserId($user->id)->firstorNew([]);
        $invoices = $invoice->whereUserId($user->id)->paginate();
        $addresses = $shippingAddress->whereUserId($user->id)->get();
        // dd(Auth::user()->id);
        return view('home', compact('user', 'profile', 'invoices', 'addresses'));
    }
}
