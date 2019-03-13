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
<div class="container text-center pagetitle">
    <h1>Available Strains</h1>
</div>
    <strains :products="{{ $strains }}" />
</div>
@stop

@section('bottom')
@stop

@section('page_scripts')
<script>

</script>
@stop

