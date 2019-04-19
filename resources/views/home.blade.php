@extends('layouts._master')

@section('content')
<div class="container" style="margin-top:2.5rem;">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="homeTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active"
                    id="shipping-addresses-tab"
                    data-toggle="tab"
                    href="#shipping-addresses"
                    role="tab"
                    aria-controls="shipping-addresses"
                    aria-selected="true">
                        Addresses
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    id="contact-tab"
                    data-toggle="tab"
                    href="#contact"
                    role="tab"
                    aria-controls="contact"
                    aria-selected="false">
                        Invoices
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                    id="profile-tab"
                    data-toggle="tab"
                    href="#profile"
                    role="tab"
                    aria-controls="profile"
                    aria-selected="false">
                        Profile
                    </a>
                </li>

            </ul>
            <div class="tab-content" id="shipping-address-content">

                <div class="card-body tab-pane fade show active"
                id="shipping-addresses"
                role="tabpanel"
                aria-labelledby="shipping-addresses-tab">
                    <div class="d-flex flex-row">
                        <i class="fa fa-5x fa-address-card"></i>
                        <h4>Shipping Addresses</h4>
                    </div>
                    <div class="container">
                    <shipping-addresses :initial_user="{{Auth::user()}}" :initial_addresses="{{ $addresses }}"></shipping-addresses>
                    </div>
                </div>

                <div class="card-body tab-pane fade"
                id="contact"
                role="tabpanel"
                aria-labelledby="contact-tab">
                    <div class="d-flex flex-row">
                        <i class="fa fa-5x fa-file-text"></i>
                        <h4>Your Invoices</h4>
                    </div>
                    <div class="container">
                        {{-- <invoices :invoices={!!  $invoices !!}></invoices> --}}
                    </div>
                </div>

                <div class="card-body tab-pane fade"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab">
                    <div class="d-flex flex-row">
                        <i class="fa fa-5x fa-cog"></i>
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="container">
                        <profile :initial_profile="{{ $profile }}" :initial_user="{{ $user }}"></profile>
                    </div>
                </div>

            </div>
    </div>
</div>
@endsection
@section('page_styles')
<style>
    .tab-content {
        background-color:white;
        border:1px solid #dee2e6;
        border-top:none;

        border-top-right-radius:4px;
        border-top-left-radius:0;

    }
    h4 {
        padding:1rem;
    }
</style>
@endsection
