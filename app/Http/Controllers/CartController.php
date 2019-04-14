<?php

namespace Heisen\Http\Controllers;

use Heisen\Cart;
use Heisen\User;
use Heisen\SeedPack;
use Illuminate\Http\Request;
use Heisen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function store(Request $request, Cart $cart, SeedPack $seedPack, User $userModel)
    {
        Session::push('cart', $request->all());
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $email = str_random(10) .'@example.com';
            $uuid = $userModel->makeUuid()->toString();
            $password = bcrypt(str_random(10));
            $user = factory(Heisen\User::class, 1)->create([
                'email' => $email,
                'uuid' => $uuid,
                'name' => 'Guest Customer',
                'email_verified_at' => now(),
                'remember_token' => str_random(10),
                'password' => $password
            ]);
        }


        $newCart = $cart->create([
            'user_id' => $user->id,
            'uuid' => $cart->uuid,
            'quantity' => $request->quantity
        ]);
            $seeds = $cart->find($newCart->id);
        $seeds->seedPacks()->attach($request->selectedPack, ['quantity' => $request->quantity]);

        return ['user' => $user, 'cart' => $newCart];
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
        //
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
