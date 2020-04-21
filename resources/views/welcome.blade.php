@extends('layouts._master')
@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center pagetitle">
        <h1>The Cheeba Shack</h1>
    </div>
    <div class="row justify-content-center">
        <h2>Artisanal Cannabis Marketplace</h2>
        <h3>Coming soon, keep it tight.</h3>
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
    {{-- @auth
    <flowers :products="{{ $flowers }}" :initial_user="'{{ Auth::user()->uuid }}'"></flwoers>
    @endauth

    @guest
    <flowers :products="{{ $flowers }}" :initial_user="'0'"></flwoers>
    @endguest --}}
</div>
@endsection
