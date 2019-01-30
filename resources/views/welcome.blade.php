@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Heisenbeans</h1>
    </div>
    <div class="row justify-content-center">
        <h2>Exceptional Genetics</h2>
    </div>
    <div class="row justify-content-center">
        <h3> <a href="https://www.instagram.com/heisenbeans/">Follow us on IG </a> <a href="https://www.instagram.com/heisenbeans/"><i class="fa fa-instagram" aria-hidden="true"></i></a></h3>
        <hr>
    </div>
    <div class="row justify-content-center hero">
        <a href="/testers"><img src="/i/heroic-colas.jpg"></a>
    </div>
    <hr>
    <div class="row justify-content-center"></div>
            @foreach(array_chunk(array_slice($posts, 0, 3), 3) as $postRow)
                <div class="row justify-content-center">
                    @foreach($postRow as $post)
                        <div class="col-md-3 col-md-offset-1 info">
                            <a href="{!! $post->link !!}">
                                <img src="{!! $post->images->standard_resolution->url !!}">
                            </a>
                            <p>
                                <a href="{!! $post->link !!}">{!! $post->caption->text !!}</a>
                            </p>
                        </div>

                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection