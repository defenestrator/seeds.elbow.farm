@extends('layouts._master')

@section('content')
<cart :payment_methods="{{$paymentMethods}}"
    :initial_addresses="{{$addresses}}"
    :initial_user="{{Auth::user()}}">
</cart>
@endsection

@section('pacge_scripts')
<script>

</script>

@endsection
