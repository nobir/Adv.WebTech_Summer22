@php
$page_title = 'Teacher | Delete';
$title = 'Delete';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('teacher.deleteSubmit', ['id' => $teacher->t_id]) }}" method="post">
            @csrf
            @error('id')
                <h4 class="error">{{ $message }}</h4><br>
            @enderror
            <h4 class="error">Are you sure you want to delete teacher Name: {{ $teacher->name }} and ID:
                {{ $teacher->s_id }}?</h4>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
