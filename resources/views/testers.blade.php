@extends('layouts.master')

@section('title')

    @parent
@stop

@section('page_styles')
    <style>
    </style>
@stop

@section('top')
    <div class="container text-center"><h1>Become a Tester!</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Simply fill out this form and we will send you beans.<a href="#limitations" alt="some restrictions apply" title="disclaimer">*</a></h3>
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
                <form class="contact" id="contact" style="margin-bottom:2em; " action="{{route('tester_request')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <input type="text" name="contact-name"
                               class="form-control input-lg" placeholder="name"
                               value="{{ old('contact-name') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="contact-email" class="form-control input-lg"
                               placeholder="email" value="{{ old('contact-email') }}"required>
                    </div>
                    <div class="form-group">
                        <textarea name="contact-msg"
                                  class="form-control input-lg"
                                  rows="6"
                                  placeholder="Please enter your mailing address" required>{{ old('contact-msg') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="journal-link" class="form-control input-lg"
                               placeholder="URL to existing grow journal, e.g. 'https://example.com/journals/your-journal'" value="{{ old('journal-link') }}"required>
                    </div>
                    <div class="form-group">*We are currently accepting testers from the United States and Canada. Thank you.</div>
                    <div class="input-group">
                        <button class="btn btn-primary input-lg" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"><img style="width:100%;" src="/i/tester.jpg" alt="Become an official Heisenbeans Tester!" title="Become an official Heisenbeans Tester!"></div>
        </div>



    </div>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop



