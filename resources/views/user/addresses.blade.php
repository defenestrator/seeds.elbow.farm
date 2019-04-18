@extends('layouts._master')

@section('title')
Create Shipping Address
    @parent
@stop

@section('page_styles')
    <style>
    </style>
@stop

@section('top')
    <div class="container text-center"><h1>Shipping Addresss</h1></div>
@stop

@section('content')
<div class="container">
        <shipping-addresses :initial_user="{{Auth::user()}}" :initial_addresses="{{ $addresses }}"></shipping-addresses>
</div>
@endsection

@section('bottom')

@stop

@section('page_scripts')

@stop



