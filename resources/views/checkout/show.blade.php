@extends('layouts._master')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Manage Strains</h1>
            </div>
        </div>

        <hr>
        <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
            <tr>
                <th>Name</th>
                <th class="d-none d-sm-table-cell">Price</th>
                <th class="d-none d-sm-table-cell">Quantity</th>
                <th class="d-none d-sm-table-cell">Total</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            @foreach($cart->seedPacks as $product)
            <tr class="table-hover">
                <td class="d-none d-sm-table-cell"><p>{{  $product->strainName }}</p></td>
                <td class="d-none d-sm-table-cell">{{ $product->price }}</td>
                <td class="d-none d-sm-table-cell">{{ $product->pivot->quantity }}</td>
                <td class="d-none d-sm-table-cell">{{ $product->price * $product->pivot->quantity }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
@endsection
