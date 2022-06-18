@php
$page_title = 'Student | List';
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

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td><a
                            href="{{ route('department.studentsByDepartment', ['id' => $student->department->d_id]) }}">{{ $student->department->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('student.edit', ['id' => $student->s_id]) }}">Edit</a>
                        <a href="{{ route('student.delete', ['id' => $student->s_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
