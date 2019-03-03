@extends('layouts._master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Heisenbeans</h1>
    </div>

     <div class="row justify-content-center">
        <h2>Exceptional Genetics</h2>
    </div>
    <hr>
    <div class="row justify-content-center info">
            <a href="/testers"><img src="/i/heroic-colas.jpg"></a>
    </div>
    <hr>
    <div class="row justify-content-center">
        <a style="text-align:center;" href="https://www.instagram.com/heisenbeans/">Follow us on IG</a>
    </div>
    <div class="row justify-content-center">
        <a style="text-align:center;" href="https://www.instagram.com/heisenbeans/">
            <img src="http://i.heisenbeans.com/images/app-icon2-small.png">
        </a>
    </div>
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
