@extends('layouts._master')
@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center pagetitle">
        <h1>The Cheeba Shack</h1>
    </div>
    <div class="row justify-content-center">
    Come get it! Expect an email soon after your order.
    </div>
    <div class="row justify-content-center">Please add thecheebashack.com to your safe senders list.</div>
    <div class="row justify-content-center">
    <p>Please report bugs <a href="{{route('contact.create', ['contact_subject' =>'technical support'])}}">here,</a> under "Technical Support."
    </div>
    @auth
    <flowers :products="{{ $flowers }}" :initial_user="'{{ Auth::user()->uuid }}'"></flwoers>
    @endauth

    @guest
    <flowers :products="{{ $flowers }}" :initial_user="'0'"></flwoers>
    @endguest

    <hr />

</div>
@endsection
