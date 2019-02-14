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
    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal new-content" role="form" enctype="multipart/form-data" method="POST" action="{{route('admin.strains.update', $strain->id)}}">
                @csrf
                <div class="form-group">
                    <!-- Header Photo Button -->
                    <input type="file" class="inputfile" name="image" value="{{$strain->image}}" />
                </div>
                <div class="form-group">
                    <div class="col-md-12"><p>Name:</p>
                    <input id="name" name="name" class="form-control input" type="text" placeholder="name" value="{{$strain->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <p>Description:</p>
                    <textarea name="description" class="form-control">{{$strain->description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2 col-sm-12">
                        <button class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
            <form class="form-horizontal new-content" role="form" method="POST" action="{{route('admin.strains.delete', $strain->id)}}">
                @csrf
                <div class="col-md-2 col-sm-12">
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div role="img" class="header-photo-preview">
                <img style="width:100%;" src="{{$strain->image}}" />
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottom')
@stop

@section('page_scripts')
<script>

</script>

@stop
