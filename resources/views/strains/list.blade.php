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
            <h1>Manage Strains</h1>
        </div>
        <div class="col-md-6">
            <a href="/admin/strains/create">
                <button class="btn btn-warning">
                    New Strain
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
            <th>Pic</th>
            <th>Name</th>
            <th>Public</th>
            <th>Page</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody class="resource-list">
        @foreach($content as $strain)
        <tr class="table-hover">
            <td><img src="{{$strain->image}}" style="width:100px;"/></td>
            <td><strong>{{ $strain->name }}</strong></td>
            <td>@if ($strain->published == 1) <span class="primary">Yes</span> @else <span class="danger">No</span> @endif</td>
            <td><a href="/strains/{{$strain->uuid}}"><button role="button" class="btn btn-primary">View</button></a></td>
            <td><a href="{{route('admin.strains.edit', $strain->id)}}"><button role="button" class="btn btn-warning">Edit</button></a></td>
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

</script>
@stop
