@extends('layouts._master')

@section('title')

    @parent
@stop

@section('page_styles')
    <style>
    </style>
@stop

@section('top')
    <div class="container text-center"><h1>Send us a message</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3">
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
                <form class="contact" id="contact" style="margin-bottom:2em; " action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="contact_name"
                               class="form-control input-lg" placeholder="Name"
                               value="{{ old('contact-name') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="contact_email" class="form-control input-lg"
                               placeholder="Email" value="{{ old('contact-email') }}"required>
                    </div>
                    <div class="form-group">
                        <select name="contact_subject" form="contact" class="form-control input-lg"
                                placeholder="email" value="{{ old('contact-subject') }}" required>
                            <option value="">What can we help you with?</option>
                            <option label="Sales" value="sales">Sales</option>
                            <option label="Payments" value="payments">Payments</option>
                            <option label="Shipping" value="shipping">Shipping</option>
                            <option label="Technical support" value="technical support">Technical support</option>
                            <option label="Something else" value="something else">Something else</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="contact_message"
                                  class="form-control input-lg"
                                  rows="6"
                                  placeholder="How can we help you?" required>{{ old('contact_msg') }}</textarea>
                    </div>
                    <div class="form-group">
                        {!! Recaptcha::render() !!}
                    </div>
                    <div class="input-group">
                        <button style="width:100%;" class="btn btn-primary input-lg" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
@stop

@section('bottom')
<div class="container">
    <div class="row justify-content-center info">
    </div>
</div>
@stop

@section('page_scripts')

@stop



