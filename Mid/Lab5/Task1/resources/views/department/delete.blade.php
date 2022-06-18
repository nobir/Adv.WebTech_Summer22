@php
$page_title = 'Department | Delete';
$title = 'Delete';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('department.deleteSubmit', ['id' => $department->d_id]) }}" method="post">
            @csrf
            @error('id')
                <h4 class="error">{{ $message }}</h4><br>
            @enderror
            <h4 class="error">Are you sure you want to delete department Name: {{ $department->name }}?</h4>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
