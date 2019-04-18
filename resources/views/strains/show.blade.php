@extends('layouts._master')

@section('title')

@parent
@stop

@section('page_styles')
    <style>
    </style>
@stop

@section('top')
@stop

@section('content')
@auth
<strain-detail :product="{{ $product }}" :initial_user="'{{ Auth::user()->uuid }}'"> </strain-detail>
@endauth

@guest
<strain-detail :product="{{ $product }}" :initial_user="'0'"> </strain-detail>
@endguest
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop
