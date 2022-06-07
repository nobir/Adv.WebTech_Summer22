@extends('layouts.main')
@section('contents')
    <h1>Registartion Page</h1>
    <div>
        <form method="post">
            {{ csrf_field() }}
            <label for="id">ID: </label>
            <input type="text" name="id" id="id" value="{{ old('id') }}">
            @error('id')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>

            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>

            <label for="dob">DOB: </label>
            <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
            @error('dob')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>

            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>

            <label for="phone">Phone: </label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>

            <input type="submit" name="submit_registration" value="Registartion">
        </form>
    </div>
@endsection
