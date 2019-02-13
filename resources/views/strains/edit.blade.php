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
{{-- {{dd($strain)}} --}}
<div class="container">
<form class="form-horizontal new-content" role="form" enctype="multipart/form-data" method="POST" action="{{route('admin.strains.update', 1)}}">
    @csrf
    <!-- Header Photo Button -->
            <div class="form-group">
                <div class="container">
                    <label type="button" class="btn btn-primary btn-upload">
                        <span>Select Header Photo</span>
                        <input ref="image" type="file" class="form-control" name="image" value="{{$strain->image}}">
                    </label>
                    <div role="img" class="header-photo-preview">
                    <img src="{{$strain->image}}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><p>Name:</p>
                <input id="name" name="name" class="form-control input" type="text" placeholder="name" value="{{$strain->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p>Description:</p>
                <textarea id=description name="description" class="form-control text-body">{{$strain->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2 col-sm-12">
                    <button class="btn btn-primary">Submit</button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('bottom')
@stop

@section('page_scripts')

@stop
