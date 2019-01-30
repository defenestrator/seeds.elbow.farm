@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Heisenbeans</h1>
    </div>
    <div class="row justify-content-center">
        <h2>Exceptional Genetics</h2>
    </div>
    <div class="row justify-content-center hero">
        <a href="/testers"><img src="/i/heroic-colas.jpg"></a>
    </div>
    <hr>
    <div class="row justify-content-center">
        <h3>The lastest from <a href="https://www.instagram.com/heisenbeans/">@heisenbeans</a> on Instagram</h3>
    </div>
            @foreach(array_chunk(array_slice($posts, 0, 12), 3) as $postRow)
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