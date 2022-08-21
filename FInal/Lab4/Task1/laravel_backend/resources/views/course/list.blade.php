@php
$page_title = 'Course | List';
$title = 'List';
@endphp

@extends('layouts.main')

@section('contents')
    <main>
        <table>
            <caption>
                @if (Session::has('message'))
                    <h4>{{ Session::get('message') }}</h4>
                @endif
            </caption>
            <tr>
                <th>Name</th>
                <th>Department Name</th>
                <th>Action</th>
            </tr>

            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td><a
                            href="{{ route('department.coursesByDepartment', ['id' => $course->department->d_id]) }}">{{ $course->department->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('course.edit', ['id' => $course->c_id]) }}">Edit</a>
                        <a href="{{ route('course.delete', ['id' => $course->c_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
