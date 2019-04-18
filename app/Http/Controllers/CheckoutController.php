<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Cart;
use Heisen\Strain;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cartModel, Strain $strain)
    {
        $items = [];
        if ($cartModel->whereUserId( Auth::user()->id)->exists()) {
            $items = $cartModel->whereUserId(Auth::user()->id)->first();
            $total = 0;
            foreach ($items->seedPacks as $seedPack) {
                $s = Strain::find($seedPack->strain_id);
                $seedPack->strainName = $s->name;
                $seedPack->strainImage = $s->image;
                $seedPack->lineTotal = $seedPack->pivot->quantity * $seedPack->price;
                $total += $seedPack->lineTotal;
            }

            return view('checkout.show',  ['cart' => $items, 'total' => $total]);
        }
        return view('checkout.show',  ['cart' => $items, 'total' => 0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
