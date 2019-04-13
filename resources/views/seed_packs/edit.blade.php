@extends('layouts._master')

@section('title')

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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Manage Seed Packs</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a style="margin:0 0.2rem;" href="/admin/seed_packs/create">
                    <button class="btn btn-primary">
                        Add New
                    </button>
                </a>
                <a style="margin:0 0.2rem;" onclick="deleteSeedPack({{ $content->id }})" >
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </a>
                <a style="margin:0 0.2rem;" href="/admin/seed_packs">
                    <button class="btn btn-warning">
                        Show List
                    </button>
                </a>
            </div>
        </div>
        <div class="row">

            <div class="col-md-8 offset-md-2" style="margin-top:1em;">
                <form class="form-horizontal new-content" role="form" enctype="multipart/form-data" method="POST" action="{{route('admin.strains.update', $content->id)}}">
                    @csrf
                    <div class="form-group row">
                            <div class="col-12">
                                <p>Strain:</p>
                                <select id="strain" name="strain" class="form-control select" value="{{ $content->strain->id }}" autofocus>
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
                                value="{{ $content->inventory }}" />
                            </div>
                            <div class="col-4">
                                <p>Price:</p>
                                <input id="price" type="number"
                                min="60" max="1000" name="price"
                                class="form-control" value="{{ $content->price }}" />
                            </div>
                                <div class="col-4">
                                    <p>Qty Per:</p>
                                    <input type="number" min="6" max="100"
                                    name="qty_per_pack"
                                    class="form-control" value="{{ $content->qty_per_pack }}" />
                                </div>
                            </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <button style="width:100%;" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page_scripts')
<script>

function deleteSeedPack(id) {
    if(confirm("Are you sure you want to delete this seed_pack?"))
    { return window.location.href = "/admin/seed_packs/destroy/" + String(id) }

    return false;
}
</script>

@stop
