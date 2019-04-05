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
<strain-detail :product="{{ $product }}"/>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop
