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
    <div class="container text-center">
        <h1>Available Strains</h1>
        @foreach(array_chunk(array_slice($strains, 0, 48), 3) as $strainRow)
        <div class="row">
            @foreach($strainRow as $strain)
            <div class="col-md-4 info">
                <h4><a href="/strain/{{$strain['id']}}">{{$strain['name']}}</a></h4>
                <a href="/strains/{{$strain['id']}}"><img src="{{ $strain['image'] }}"></a>

                    <form action="POST" target="/cart">
                            @csrf
                            <div class="form-group">
                                <div class="form-group custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        class="custom-control-input"
                                        id="seed-pack-6-{{$strain['id']}}"
                                        name="seed-pack-{{$strain['id']}}"
                                        v-model.number="selectedPack" value="6" checked  disabled/>
                                    <label
                                        class="custom-control-label"
                                        for="seed-pack-6-{{$strain['id']}}">
                                        6 for $60
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        class="custom-control-input"
                                        id="seed-pack-12-{{$strain['id']}}"
                                        name="seed-pack-{{$strain['id']}}"
                                        v-model.number="selectedPack"
                                        value="12" disabled />
                                    <label
                                        class="custom-control-label"
                                        for="seed-pack-12-{{$strain['id']}}">
                                        12 for $100
                                    </label>
                                </div>
                            </div>
                            <p><sup>*</sup> Disabled: under development <sup>*</sup></p>
                            <div class="form-group">
                                <label for="quantity-{{$strain['id']}}">qty:</label>
                                <input
                                    type="number"
                                    name="quantity-{{$strain['id']}}"
                                    value="1"
                                    min="1"
                                    max="10"
                                    id="quantity-{{$strain['id']}}" disabled/>
                                <button
                                    role="button"
                                    id="buy-now-{{$strain['id']}}"
                                    class="btn btn-primary  " disabled >
                                    BUY NOW
                                </button>
                                &nbsp;
                                <button
                                    role="button"
                                    id="add-to-cart-{{$strain['id']}}"
                                    class="btn btn-default add-to-cart"
                                    v-on:click.stop.prevent="addToCart($event)" disabled>
                                    ADD TO CART
                                </button>

                            </div>
                    </form>
            </div>
            @endforeach
        </div>
        <hr>
        @endforeach
    </div>
@stop

@section('bottom')
@stop

@section('page_scripts')
<script>

</script>
@stop

