@extends('layouts._master')
@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <img src="/images/shoreline.png" alt="Shoreline Genetics. Keepers in Every Pack.">
    </div>
    <div class="row justify-content-center">
        <h1 style="font-style:italic;">Shoreline Genetics</h1>
    </div>
    <div class="row justify-content-center">
        <h2>Artisanal Cannabis</h2>
    </div>
    <div class="row justify-content-center">
        <h3>Keepers in Every Pack.</h3>
    </div>
    <div class="row justify-content-center">
        <p>
            Please report bugs
            <a href="{{route('contact.create', ['contact_subject' =>'technical support'])}}">
                here,
            </a>
            under "Technical Support."
        </p>
    </div>
    @auth
    <flowers :products="{{ $flowers }}" :initial_user="'{{ Auth::user()->uuid }}'"></flowers>
    @endauth

    @guest
    <flowers :products="{{ $flowers }}" :initial_user="'0'"></flowers>
    @endguest
</div>
@endsection
