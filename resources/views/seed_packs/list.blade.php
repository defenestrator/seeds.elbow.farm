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
        <div class="col-md-6">
            <h1>Manage Seed Packs</h1>
        </div>
        <div class="col-md-6">
            <a href="/admin/seed_packs/create">
                <button style="width:100%;" class="btn btn-warning">
                    New Seed Packs
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-inverse">
        <thead class="thead-inverse">
        <tr>
            <th class="d-none d-table-cell">Strain</th>
            <th class="d-none d-sm-table-cell">Price</th>
            <th class="d-none d-sm-table-cell">Qty Per</th>
            <th class="d-none d-sm-table-cell">Inventory</th>
            <th class="d-none d-sm-table-cell">Edit</th>
            <th class="d-none d-sm-table-cell">Delete</th>
        </tr>
        </thead>
        <tbody class="resource-list">
        @foreach($content as $seed_pack)
        <tr class="table-hover">
            <td><strong>{{ $seed_pack->strain->name }}</strong></td>
            <td class="d-none d-sm-table-cell">{{ $seed_pack->price }}</td>
            <td class="d-none d-sm-table-cell">{{ $seed_pack->qty_per_pack }}</td>
            <td class="d-none d-sm-table-cell">{{ $seed_pack->inventory }}</td>
            <td><a href="{{ route('admin.seed_packs.edit', $seed_pack->id)}}"> <button role="button" class="btn btn-warning">Edit</button></a></td>
            <td><button id="delete"
                role="button"
                class="btn btn-danger"
                onclick="deleteSeedPack({{ $seed_pack->id }})">Delete</button></td>

        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
@endsection

@section('bottom')
@stop

@section('page_scripts')
<script>
function deleteSeedPack(id) {
    if(confirm("Are you sure you want to delete this seedpack?"))
    { return window.location.href = "/admin/seed_packs/destroy/" + String(id) }

    return false;
}
</script>
@stop
