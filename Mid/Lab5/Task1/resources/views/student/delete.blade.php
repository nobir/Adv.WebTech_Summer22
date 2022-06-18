@php
$page_title = 'Student | Delete';
$title = 'Delete';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('student.deleteSubmit', ['id' => $student->s_id]) }}" method="post">
            @csrf
            @error('id')
                <h4 class="error">{{ $message }}</h4><br>
            @enderror
            <h4 class="error">Are you sure you want to delete Student Name: {{ $student->name }} and ID:
                {{ $student->s_id }}?</h4>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
