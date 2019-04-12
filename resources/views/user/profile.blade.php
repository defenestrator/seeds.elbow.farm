@extends('layouts._master')

@section('content')
<div class="container">
        <profile :initial_profile="{{ $profile }}" :initial_user="{{ $user }}"></profile>
</div>
@endsection
