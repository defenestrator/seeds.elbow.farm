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
    <div class="container text-center"><h1>Create Shipping Address</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div id="errors">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form class="contact" id="contact" style="margin-bottom:2em; " action="{{route('tester-request')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="contact-name"
                               class="form-control input-lg" placeholder="Name"
                               value="{{ old('contact-name') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="contact-email" class="form-control input-lg"
                               placeholder="Email" value="{{ old('contact-email') }}"required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="contact-address-1" class="form-control input-lg"
                               placeholder="Street Address" value="{{ old('contact-address-1') }}"required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="contact-address-2" class="form-control input-lg"
                               placeholder="Apt/Ste/Unit # (optional)" value="{{ old('contact-address-2') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="contact-city" class="form-control input-lg"
                               placeholder="City" value="{{ old('contact-city') }}"required>
                    </div>
                    <div class="form-group">
                        <select name="contact-state" form="contact" class="form-control input-lg"
                                placeholder="email" value="{{ old('contact-state') }}" required>
                            <option value="">State/Province</option>
                            <optgroup label="States:">States:</optgroup>
                            @foreach($states as $state)
                            <option label="{{$state}}" value="{{$state}}">{{$state}}</option>
                            @endforeach
                            <optgroup label="-----------">-----------</optgroup>
                            <optgroup label="Provinces:">Provinces:</optgroup>
                            @foreach($provinces as $province)
                                <option label="{{$province}}" value="{{$province}}">{{$province}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="postcode" class="form-control input-lg"
                               placeholder="Postal Code" value="{{ old('postcode') }}" required>
                    </div>
                    <div class="form-group">
                        <textarea name="contact-msg"
                                  class="form-control input-lg"
                                  rows="6"
                                  placeholder="Write us a personal message (optional)">{{ old('contact-msg') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="journal-link" class="form-control input-lg"
                               placeholder="URL to grow journal" value="{{ old('journal-link') }}" required>
                    </div>
                    <div class="form-group"><a href="#limitations" alt="some restrictions apply" title="disclaimer">*</a>
                        We are currently accepting testers from the United States and Canada.</div>
                    <div class="input-group">
                        <button style="width:100%;" class="btn btn-primary input-lg" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-3 info"><img style="width:100%;" src="/i/tester.jpg" alt="Become an official Heisenbeans Gear Tester!" title="Become an official Heisenbeans Tester!"></div>
        </div>



    </div>
@stop

@section('bottom')
<div class="container">
    <div class="row justify-content-center info">
            <a href="/testers"><img src="/i/heroic-colas.jpg"></a>
    </div>
</div>
@stop

@section('page_scripts')

@stop



