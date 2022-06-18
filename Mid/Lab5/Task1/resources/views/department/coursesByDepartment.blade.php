@php
$page_title = 'Course | List by Department';
$title = 'List';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        @if (Session::has('message'))
            <h4>{{ Session::get('message') }}</h4><br>
        @endif
        <table>
            <caption>
                <h3>Department Name: {{ $department->name }}</h3>
            </caption>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>

            @foreach ($department->courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>
                        <a href="{{ route('course.edit', ['id' => $course->c_id]) }}">Edit</a>
                        <a href="{{ route('course.delete', ['id' => $course->c_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
