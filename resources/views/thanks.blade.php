@extends('layouts._master')

@section('title')
    Thanks for your interest.
    @parent
@stop

@section('page_styles')
@stop

@section('top')

    <div class="text-center container">
    <div class="tagline text-center" style="background-image: none;">
        <h1 style="margin-top:1em;">
            {{$message}}
        </h1>
    </div>

    <hr>
        </div>
@stop
@section('content')
    <div class="row">
        <div class="text-center container">
            <h2>
                <a href="/">Thanks!</a>
            </h2>
            <a href="/">
            <img src="/i/logo.png" style="border-radius:1em;"
                 alt="Dropping fire like 'what?'"
                 title="Dropping fire like 'what?'"
            ></a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            &nbsp;
        </div>
    </div>
@stop
@section('bottom')
    <div class="col-md-12 col-md-offset-0">
        &nbsp;
    </div>
    <br>
@stop
{{-- footer scripts --}}
@section('page_scripts')

@stop
