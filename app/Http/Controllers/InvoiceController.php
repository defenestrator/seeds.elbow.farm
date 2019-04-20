<?php

namespace Heisen\Http\Controllers;

use Heisen\Invoice;
use Heisen\Cart;
use Heisen\SeedPack;
use Illuminate\Http\Request;

use Auth;
class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CartController $death)
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Invoice $invoice)
    {
        $invoices = 'none';
        if ($invoice->whereUserId(Auth::user()->id)->exists()) {
            $invoices = $invoice->whereUserId(Auth::user()->id)->get();
        }

        return view('user.invoices', compact('invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice, Cart $cartModel, SeedPack $seedPackModel)
    {
        $uuid = $invoice->makeUuid();
        $new = $invoice->create([
            'total' => $request->total,
            'uuid' => $uuid,
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'customer_notes' => $request->customer_notes,
            'status' => 'new'
        ]);

        $total = 0;

        foreach($request->items as $value) {
            $pack = $seedPackModel->fine($value['pivot']['seed_pack_id']);
            $newInventory = $pack->inventory - $value['pivot']['quantity'];
            $new->seedPacks()->attach([$value['pivot']['seed_pack_id'] => ['quantity' => $value['pivot']['quantity']]]);



        }
        $new->fresh();

        if ($cartModel->whereUserId(Auth::user()->id)->exists()) {
            $cart = $cartModel->whereUserId(Auth::user()->id)->first();
            $cart->seedPacks()->detach();
            $cart->destroy($cart->id);
            return redirect()->action('WelcomeController@index')->withErrors(['thanks' => 'Your order has been placed.']);
        }

        return back()->withErrors(['error' => 'Your order was not placed.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Heisen\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Heisen\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Heisen\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Heisen\Invoice  $invoice
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
