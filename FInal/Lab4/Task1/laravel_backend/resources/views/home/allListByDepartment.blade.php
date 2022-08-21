@php
$page_title = 'All List by Department';
$title = 'List';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <div>
            <h3>Department Name: {{ $department->name }}</h3>
            <h3>Department ID: {{ $department->d_id }}</h3>
            <hr>
            <h3>Offer Course:</h3>
            <hr>

            <ol>
                @foreach ($department->courses as $course)
                    <li>
                        <span>{{ $course->name }}</span> -
                        @foreach ($course->teachers as $teacher)
                            <span>{{ $teacher->name }}</span>
                        @endforeach
                        <br>
                        <ul>
                            @foreach ($course->students as $student)
                                <li>
                                    <span>{{ $student->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ol>
        </div>
    </main>
@endsection
