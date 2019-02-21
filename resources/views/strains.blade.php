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
    <div class="container text-center">
        <h1>Available Strains</h1>
        @foreach(array_chunk(array_slice($strains, 0, 48), 3) as $strainRow)
        <div class="row">
            @foreach($strainRow as $strain)
            <div class="col-md-4 info">
                <h4><a href="/strain{{$strain['id']}}">{{$strain['name']}}</a></h4>
                <a href="/strains/{{$strain['id']}}"><img src="{{ $strain['image'] }}"></a>
                <button class="btn btn-primary" disabled>Soon!</button>
            </div>
            @endforeach
        </div>
        <hr>
        @endforeach
    </div>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop

