<?php

namespace Heisen\Http\Controllers;

use Heisen\ShippingAddress;
use Illuminate\Http\Request;
use Auth;

class ShippingAddressController extends LocationController
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingAddress $shippingAddress)
    {
        $addresses = $shippingAddress->whereUserId(Auth::user()->id)->get();
        $states = $this->states;
        $provinces = $this->provinces;
        return view('user.addresses', compact('addresses', 'states', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingAddress $shippingAddress)
    {
        return $shippingAddress->whereUserId(Auth::user()->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingAddress $shippingAddress, $id)
    {
        return $shippingAddress->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingAddress $shippingAddress)
    {
        $this->validate([
            'address_1' => 'required|min:7:max:140',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'ship_to_name' => 'required',
        ]);
        return $shippingAddress->updateOrCreate($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingAddress $shippingAddress)
    {
        //
    }
}
