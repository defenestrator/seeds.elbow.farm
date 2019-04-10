@extends('layouts._master')

@section('content')
<div class="container">
        <profile :initial_profile="{{ $profile }}"></profile>
</div>
@endsection
