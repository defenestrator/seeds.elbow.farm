@extends('layouts._master')

@section('content')
<cart :initial_user="'{{Auth::user()->uuid}}'"></cart>
@endsection
