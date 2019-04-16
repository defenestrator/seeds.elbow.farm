<?php

namespace Heisen\Http\Controllers;

use Heisen\Cart;
use Heisen\User;
use Heisen\SeedPack;
use Heisen\Strain;
use Illuminate\Http\Request;
use Heisen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cart $cartModel, SeedPack $seedPack, User $userModel)
    {
        $user = $userModel->whereUuid($request->uuid)->first();

        $newCart = $cartModel->firstOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id, 'uuid' => $cartModel->makeUuid()]
        );

         foreach($request->except('uuid') as $key => $value) {
            $newCart->seedPacks()->attach($key, ['quantity' => $value]);
        }

        $items = $cartModel->whereUserId($newCart->user_id)->with('seedPacks')->first();
        $seedPacks = collect($items->seedPacks()->get());

        $seedPacks->map( function($pack){
            $pack->name = Strain::whereId($pack->strain_id)->get(['name']);
            $pack->quantity = $pack->pivot->quantity;
            return $pack;
        });

        return ['cart' => $seedPacks];
    }

    /**
     * Display the specified resource.
     *
     * @param  \Heisen\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return 'Your cart is empty';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Heisen\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Heisen\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->whereUserId(Auth::user()->id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Heisen\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
