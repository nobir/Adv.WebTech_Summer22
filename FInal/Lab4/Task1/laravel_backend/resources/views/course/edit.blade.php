@php
$page_title = 'Course | Edit';
$title = 'Edit';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('course.editSubmit', ['id' => $course->c_id]) }}" method="post">
            @csrf
            @if (Session::has('message'))
                <h4>{{ Session::get('message') }}</h4><br>
            @endif
            @error('id')
                <h4 class="error">{{ $message }}</h4><br>
            @enderror
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ $course->name }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>
            <label for="department">Department: </label>
            <select name="department" id="department">
                @foreach ($departments as $department)
                    <option value="{{ $department->d_id }}" {{ $course->d_id == $department->d_id ? 'selected' : '' }}>
                        {{ $department->name }}</option>
                @endforeach
            </select>
            @error('department')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
