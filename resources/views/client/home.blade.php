@extends('client.master')
@section('Banner')
<section class="banner">
        @include('client.partials.banner')
    </section>
@endsection

@section('Hot_Product')
@include('client.partials.hot_product',['products'=>$products])
@endsection

@section('New_Product')
@include('client.partials.new_product',['trends'=>$trends])
@endsection