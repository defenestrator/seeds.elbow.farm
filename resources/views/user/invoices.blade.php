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
    <div class="container text-center"><h1>Invoices</h1></div>
@stop

@section('content')
<div class="container">
        <invoices :initial_user="{{Auth::user()}}" :initial_invoices="{{ $invoices }}">
        </invoices>
</div>
@endsection

@section('bottom')

@stop

@section('page_scripts')

@stop
