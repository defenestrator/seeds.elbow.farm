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
    <table class="table table-striped table-inverse">
        <thead class="thead-inverse">
        <tr>
            <th>Title</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody class="resource-list">
        @foreach($content as $strain)
        <tr class="table-hover">
            <td><strong>{{ $strain->name }}</strong></td>
            <td><a href="{{route('admin.strains.edit', $strain->id)}}"><button role="button" class="btn btn-warning">Edit</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('bottom')
@stop

@section('page_scripts')
<script>

</script>
@stop
