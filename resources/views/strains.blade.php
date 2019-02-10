@extends('layouts.master')

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
            <div class="col-md-4">
                <h3>{{$strain['name']}}</h3>
            <img style=width:100%;" src="{{$strain['image']}}">
            </div>
            @endforeach
        </div>
        @endforeach
        <div class="row">
            <div class="col-sm-6">
                <h4>Wedding Cake S1 Feminized Seeds</h4>
                <h5>* OUT OF STOCK *</h5>
                <img style="width:100%;" src="/i/cake.jpg">
            </div>
            <div class="col-sm-6">
                <h3>Gorilla Glue #4 S1 Feminized Seeds</h3>
                <h5>* OUT OF STOCK *</h5>
                <img style="width:100%;" src="/i/glue.jpg">
            </div>
        </div>

    </div>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop

