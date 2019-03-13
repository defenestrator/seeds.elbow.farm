@extends('layouts._master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p>Thanks for registering for hesienbeans.com, there really isn't anything here for public
                            users just yet, but there will be updates every day for the foreseeable future. Keep it
                            tight, friends.
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
