@extends('layouts._master')
@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center pagetitle">
        <h1>Heisenbeans</h1>
    </div>
    <div class="row justify-content-center">
    Come get it! Expect an email soon after your order.
    </div>
    <div class="row justify-content-center">Please add heisenbeans.com to your safe senders list.</div>

    @auth
    <strains :products="{{ $strains }}" :initial_user="'{{ Auth::user()->uuid }}'"></strains>
    @endauth

    @guest
    <strains :products="{{ $strains }}" :initial_user="'0'"></strains>
    @endguest

    <hr />
    <div class="row justify-content-center">
        <a style="text-align:center;" href="https://www.instagram.com/heisenbeans_genetics/">Follow us on IG</a>
    </div>
    <div class="row justify-content-center">
        <a style="text-align:center;" href="https://www.instagram.com/heisenbeans_genetics/">
            <img src="http://i.heisenbeans.com/images/app-icon2-small.png">
        </a>
    </div>
    <div>
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
@endsection
