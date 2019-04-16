@extends('layouts._master')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Checkout</h1>
            </div>
        </div>

        <hr>
        <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
            <tr>
                <th class="d-none d-sm-table-cell">Strain</th>
                <th class="d-none d-sm-table-cell"></th>
                <th class="d-none d-sm-table-cell">Price</th>
                <th class="d-none d-sm-table-cell">Quantity</th>
                <th class="d-none d-sm-table-cell">Total</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            @foreach($cart->seedPacks as $product)
            <tr class="table-hover">
                <td class="d-none d-sm-table-cell"><img src="{{ $product->strainImage }}" style="width:80px;"></td>
                <td class="d-none d-sm-table-cell"><p>{{  $product->strainName }}</p><p>Pack of {{  $product->qty_per_pack }} feminized seeds</p></td>
                <td class="d-none d-sm-table-cell">${{ $product->price }}</td>
                <td class="d-none d-sm-table-cell">{{ $product->pivot->quantity }}</td>
                <td class="d-none d-sm-table-cell">{{ $product->lineTotal }}</td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr class="table-hover">
                    <td class="d-none d-table-cell" colspan="3"><h4>Total:</h4></td>
                    <td class="d-none d-table-cell" ><h4> ${{ $total }}.00</h4></td>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
    </div>
@endsection
