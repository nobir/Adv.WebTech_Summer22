@extends('layouts.main')
@section('contents')
    <h1>Product </h1>
    <div>
        <strong>Product ID: </strong><span>{{$product['product_id']}}</span><br>
        <strong>Product Name: </strong><span>{{$product["product_name"]}}</span><br>
        <strong>Product Price: </strong><span>{{$product["product_price"]}}</span><br>
    </div>
@endsection
