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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create a new Strain</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal new-content" role="form" enctype="multipart/form-data" method="POST" action="{{route('admin.strains.store')}}">
                @csrf
                <div class="form-group row col-md-12">
                    <!-- Header Photo Button -->
                    <input type="file" class="inputfile" name="image" onchange="previewFile()" value="{{old('image')}}" />
                </div>
                <div class="form-group row">
                    <div class="col-md-12"><p>Name:</p>
                    <input id="name" name="name" class="form-control input" type="text" placeholder="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Description:</p>
                    <textarea name="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="feminized">Feminized?</label>
                        <input type="checkbox" name="feminized" id="feminized"/>
                    </div>
                    <div class="col-md-6">
                        <label for="retail_price">Price:</label>
                        <input type="number" min="30" max="200" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="min_flowering_time">Min Weeks</label>
                        <input type="number" min="6" max="15" default="9" name="min_flowering_time" id="min_flowering_time"/>
                    </div>
                    <div class="col-md-6">
                        <label for="max_flowering_time">Max Weeks</label>
                        <input type="number" min="6" max="15" default="9" name="max_flowering_time" id="max_flowering_time"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-sm-6">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <a href="{{route('admin.strains.create')}}">
                        <button class="btn btn-warning">
                            New
                        </button>
                    </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <img id="preview" src="" />
        </div>
    </div>
</div>
@endsection

@section('bottom')
@stop

@section('page_scripts')
<script>
function previewFile() {
  var preview = document.querySelector('#preview');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result
    preview.style =  'width:100%;'
    preview.classList = 'info'
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
</script>
@stop
