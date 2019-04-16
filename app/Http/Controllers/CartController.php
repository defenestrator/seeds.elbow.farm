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

        $items = $cartModel->find(Auth::user()->id);
        $total = 0;
        foreach ($items->seedPacks as $seedPack) {
            $s = Strain::find($seedPack->strain_id);
            $seedPack->strainName = $s->name;
            $seedPack->strainImage = $s->image;
            $seedPack->lineTotal = $seedPack->pivot->quantity * $seedPack->price;
            $total += $seedPack->lineTotal;
        }
        return ['cart' => $items, 'total' => $total];
    }

    /**
     * Display the specified resource.
     *
     * @param  \Heisen\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cartModel)
    {
        $items = $cartModel->find(Auth::user()->id);
        $total = 0;

        foreach ($items->seedPacks as $seedPack) {
            $s = Strain::find($seedPack->strain_id);
            $seedPack->strainName = $s->name;
            $seedPack->strainImage = $s->image;
            $seedPack->lineTotal = $seedPack->pivot->quantity * $seedPack->price;
            $total += $seedPack->lineTotal;
        }
        return ['cart' => $items, 'total' => $total];
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
    public function update(Request $request, Cart $cartModel)
    {
        $cart = $cartModel->whereUserId(Auth::user()->id);
        foreach($request->except('uuid') as $key => $value) {
            $cart->seedPacks()->attach($key, ['quantity' => $value]);
        }

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
