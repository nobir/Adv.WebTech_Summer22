@php
$page_title = 'Student | Registration';
$title = 'Registration';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <form action="{{ route('student.createSubmit') }}" method="post">
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
            <label for="department">Department: </label>
            <select name="department" id="department">
                @foreach ($departments as $department)
                    <option value="{{ $department->d_id }}" {{ old('department') == $department->d_id ? "selected" : "" }}>{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>
            <label for="courses">Course: </label>
            <select name="courses[]" id="courses" multiple>
                @foreach ($courses as $course)
                    <option value="{{ $course->c_id }}" {{ old('courses') == $course->c_id ? "selected" : "" }}>{{ $course->name }}</option>
                @endforeach
            </select>
            @error('courses')
                <span class="error">{{ $message }}</span>
            @enderror
            <br>
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
