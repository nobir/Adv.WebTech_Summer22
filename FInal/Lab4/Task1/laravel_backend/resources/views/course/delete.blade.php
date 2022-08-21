@php
$page_title = 'Course | Delete';
$title = 'Delete';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('course.deleteSubmit', ['id' => $course->c_id]) }}" method="post">
            @csrf
            @error('id')
                <h4 class="error">{{ $message }}</h4><br>
            @enderror
            <h4 class="error">Are you sure you want to delete Course Name: {{ $course->name }} and ID:
                {{ $course->c_id }}?</h4>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
