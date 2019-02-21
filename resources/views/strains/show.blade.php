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
<div class="container">
    <div class="row col-md-12">
        <h1>{{ $strain->name }}</h1>
    </div>
    <div class="row col-md-12">
        <p>{{$strain->description}}</p>
        <p>{{$strain->price}}</p>
    </div>
</div>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop
