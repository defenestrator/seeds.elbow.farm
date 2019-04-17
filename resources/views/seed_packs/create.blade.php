@extends('layouts._master')

@section('title')
Create Seed Pack Inventory
@parent
@stop

@section('page_styles')
<style>

</style>
@stop

@section('top')
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
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
        </div>
    </div>
</div>
@stop

@section('content')

<div class="container">
    @if ($errors->any())
    <div class="row col-md-12 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1>New Seed Packs</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form class="form-horizontal new-content" role="form" enctype="multipart/form-data" method="POST" action="{{route('admin.seed_packs.store')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-12">
                        <p>Strain:</p>
                        <select id="strain" name="strain" class="form-control select" value="{{old('strain')}}" autofocus>
                            <option value="">--Please choose a Strain--</option>
                            @foreach($strains as $strain)
                                <option value="{{ $strain->id }}">{{ $strain->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <p>Inventory:</p>
                        <input id="inventory"
                        name="inventory"
                        class="form-control input"
                        type="number"
                        value="{{ old('inventory') }}" />
                    </div>
                    <div class="col-4">
                        <p>Price:</p>
                        <input id="price" type="number"
                        min="60" max="1000" name="price"
                        class="form-control" value="{{old('price')}}" />
                    </div>
                        <div class="col-4">
                            <p>Qty Per:</p>
                            <input type="number" min="6" max="100"
                            name="qty_per_pack"
                            class="form-control" value="{{old(' qty_per_pack')}}" />
                        </div>
                    </div>
                <div class="form-group row">
                </div>
                <div class="form-group row">
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button style="width:100%;" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result
            preview.style = 'width:100%;'
            preview.classList = 'info'
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

</script>
@stop
