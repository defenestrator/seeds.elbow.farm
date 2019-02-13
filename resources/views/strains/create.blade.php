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
<strain content_type="strains" user="{{ Auth::user() }}"></strain>
@endsection

@section('bottom')
@stop

@section('page_scripts')

@stop
