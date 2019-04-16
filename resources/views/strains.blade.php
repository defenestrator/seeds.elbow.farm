@extends('layouts._master')

@section('title')

@parent
@endsection

@section('page_styles')
    <style>
    </style>
@endsection

@section('top')
@endsection

@section('content')
<div class="container text-center pagetitle">
    <h1>Available Strains</h1>
</div>
    @auth
    <strains :products="{{ $strains }}" :initial_user="'{{ Auth::user()->uuid }}'" ></strains>
    @endauth
    @guest
    <strains :products="{{ $strains }}" :initial_user="'0'" ></strains>
    @endguest
</div>
@endsection

@section('bottom')
@endsection

@section('page_scripts')
<script>

</script>
@endsection

