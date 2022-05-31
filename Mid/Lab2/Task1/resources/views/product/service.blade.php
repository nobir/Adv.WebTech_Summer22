@extends('layout.main')
@section('content')

    <h1>Service</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Dob</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
            <td>{{$product['name']}}</td>
            <td>{{$product['dob']}}</td>
        </tr>
        @endforeach
    </table>
@endsection