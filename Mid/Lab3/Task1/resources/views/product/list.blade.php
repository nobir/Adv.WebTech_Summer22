@extends('layouts.main')
@section('contents')
    <h1>Product List Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Dob</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    <a href="{{ route('product.single', ['id' => $product->id]) }}">{{ $product->product_id }}</a>
                </td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
            </tr>
        @endforeach
    </table>
@endsection
