@php
$page_title = 'Department | Registration';
$title = 'Registration';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('department.createSubmit') }}" method="post">
            @csrf
            @if(Session::has('message'))
                <h4>{{ Session::get('message') }}</h4><br>
            @endif
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
