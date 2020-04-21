<?php

namespace Cheeba\Http\Controllers;

use Cheeba\Cart;
use Cheeba\User;
use Cheeba\SeedPack;
use Cheeba\Strain;
use Illuminate\Http\Request;
use Cheeba\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
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
            $newCart->seedPacks()->sync([$key => ['quantity' => $value]]);
        }

        $total = 0;
        foreach ($newCart->fresh()->seedPacks as $seedPack) {
            $s = Strain::find($seedPack->strain_id);
            $seedPack->strainName = $s->name;
            $seedPack->strainImage = $s->image;
            $seedPack->lineTotal = $seedPack->pivot->quantity * $seedPack->price;
            $total += $seedPack->lineTotal;
        }
        return ['cart' => $newCart->fresh(), 'total' => $total];
    }

    /**
     * Display the specified resource.
     *
     * @param  \Cheeba\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cartModel)
    {
        if ($cartModel->whereUserId(Auth::user()->id)->exists()) {
            $total = 0;
            $items = $cartModel->whereUserId(Auth::user()->id)->first();
            foreach ($items->seedPacks as $seedPack) {
                $s = Strain::find($seedPack->strain_id);
                $seedPack->strainName = $s->name;
                $seedPack->strainImage = $s->image;
                $seedPack->lineTotal = $seedPack->pivot->quantity * $seedPack->price;
                $total += $seedPack->lineTotal;
            }
            return ['cart' => $items, 'total' => $total];
        }

        return response('', 204);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Cheeba\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cartModel)
    {
        if ($cartModel->whereUserId(Auth::user()->id)->exists()) {
            $cart = $cartModel->whereUserId(Auth::user()->id)->first();
            $products = $request->except('uuid');
            $cart->seedPacks()->detach();
            if (empty($products)) {
                return response('OK', 200);
            }
            foreach($request->except('uuid') as $key => $value) {
                $cart->seedPacks()->attach($key, ['quantity' => $value]);
            }

            $total = 0;
            foreach ($cart->fresh()->seedPacks as $seedPack) {
                $s = Strain::find($seedPack->strain_id);
                $seedPack->strainName = $s->name;
                $seedPack->strainImage = $s->image;
                $seedPack->lineTotal = $seedPack->pivot->quantity * $seedPack->price;
                $total += $seedPack->lineTotal;
            }
            return ['cart' => $cart->fresh(), 'total' => $total];
        }

        return response('',204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Cheeba\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cartModel)
    {
        if ($cartModel->whereUserId(Auth::user()->id)->exists()) {
            $cart = $cartModel->whereUserId(Auth::user()->id)->first();
            $cart->seedPacks()->detach();
            $cart->destroy($cart->id);
            return response('Resource marked for deletion', 202);
        }
        return response('Resource not found', 501);
    }
}
