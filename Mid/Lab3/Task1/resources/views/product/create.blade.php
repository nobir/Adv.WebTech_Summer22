@extends('layouts.main')
@section('contents')
    <h1>Product Create Page</h1>
    <hr>

    <form method="post">
        {{ @csrf_field() }}
        <label for="id">ID: </label>
        <input type="text" name="id" id="id" value="{{ old('id') }}">
        @error('id')
            <span style="color:red">{{ $message }}</span>
        @enderror
        <br>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <span style="color:red">{{ $message }}</span>
        @enderror
        <br>
        <label for="price">Price: </label>
        <input type="text" name="price" id="price" value="{{ old('price') }}">
        @error('price')
            <span style="color:red">{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" name="product_create" value="Create">
    </form>
@endsection
