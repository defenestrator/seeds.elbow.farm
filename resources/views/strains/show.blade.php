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
        <div class="col-sm-12 pagetitle">
            <h1>{{ $strain->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 info">
            <img src="{{$strain->image}}"
                title="Picture of {{$strain->name}}, {{ $strain->feminized }} seeds for sale"
                alt="Picture of {{$strain->name}}, {{ $strain->feminized }} seeds for sale">
        </div>
        <div class="col-md-4 info">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Buy {{$strain->feminized}} {{$strain->name}} seeds
                    </h5>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <form action="POST" target="/cart">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-group custom-control custom-radio custom-control-inline">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    id="seed-pack-6"
                                                    name="seed-pack"
                                                    value="6" checked/>
                                                <label
                                                    class="custom-control-label"
                                                    for="seed-pack-6">
                                                    6 seeds $60
                                                </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input
                                                    type="radio"
                                                    class="custom-control-input"
                                                    id="seed-pack-12"
                                                    name="seed-pack"

                                                    value="12" />
                                                <label
                                                    class="custom-control-label"
                                                    for="seed-pack-12">
                                                    12 seeds $100
                                                </label>
                                            </div>
                                        </div>
                                        <p><sup>*</sup> Disabled: under development <sup>*</sup></p>
                                        <div class="form-group form-inline" style="justify-content: center;">
                                            <label for="quantity" class="form-label form-inline"></label>
                                            <input
                                                class="form-control form-inline input-group-sm"
                                                style="width:60px;"
                                                type="number"
                                                name="quantity-"
                                                value="1"
                                                min="1"
                                                max="10"
                                                id="quantity"/>
                                            &nbsp;
                                            <button
                                                role="button"
                                                id="buy-now"
                                                class="btn btn-primary form-inline input-group-sm"
                                                disabled>
                                                BUY
                                            </button>
                                            &nbsp;
                                            <button
                                                role="button"
                                                id="add-to-cart"
                                                class="btn btn-outline-gray form-inline input-group-sm"
                                                v-on:click.stop.prevent="addToCart($event)">
                                                ADD TO CART
                                            </button>

                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                    <p class="card-title">
                        Genetics: {{ $strain->genetics }}
                    </p>
                    <p>
                        Min flowering time: {{ $strain->flowering_time_min_weeks}} weeks
                    </p>
                    <p>
                        Max flowering time: {{ $strain->flowering_time_max_weeks}} weeks
                    </p>
                </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        {{ $strain->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop
