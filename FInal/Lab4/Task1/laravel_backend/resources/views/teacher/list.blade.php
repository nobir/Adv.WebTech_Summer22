@php
$page_title = 'Teacher | List';
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

            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td><a
                            href="{{ route('department.teachersByDepartment', ['id' => $teacher->department->d_id]) }}">{{ $teacher->department->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('teacher.edit', ['id' => $teacher->t_id]) }}">Edit</a>
                        <a href="{{ route('teacher.delete', ['id' => $teacher->t_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
