@extends('layouts._master')

@section('content')
<div class="container" style="margin-top:2.5rem;">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="border:none;">
                <div class="card-header"><h4>Shipping Addresses</h4></div>
                <div class="card-body">
                    <div class="d-flex container">
                       <a href="/shipping-addresses"><i class="fa fa-5x fa-address-card"></i></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="border:none;">
                <div class="card-header"><h4>Your Invoices</h4></div>
                <div class="card-body">
                    <div class="d-flex container">
                       <a href="/orders"><i class="fa fa-5x fa-file-text"></i></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="border:none;">
                <div class="card-header"><h4>Profile & Settings</h4></div>

                <div class="card-body">
                    <div class="d-flex container">
                        <a href="/profile"><i class="fa fa-5x fa-cog"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
