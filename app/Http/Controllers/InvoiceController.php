<?php

namespace Heisen\Http\Controllers;

use Heisen\Invoice;
use Illuminate\Http\Request;

use Auth;
class InvoiceController extends Controller
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
    public function index(Invoice $invoice)
    {
        $invoices = $invoice->whereUserId(Auth::user()->id)->get();
        return view('user.invoices', ['invoices' => $invoices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice)
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
            $new->seedPacks()->attach([$value['pivot']['seed_pack_id'] => ['quantity' => $value['pivot']['quantity']]]);
        }

        $new->fresh();
        return ['invoice' => $new];
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
    public function destroy(Invoice $invoice)
    {
        //
    }
}
