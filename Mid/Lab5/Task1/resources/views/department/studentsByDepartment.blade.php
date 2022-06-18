@php
$page_title = 'Student | List by Department';
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

            @foreach ($department->students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>
                        <a href="{{ route('student.edit', ['id' => $student->s_id]) }}">Edit</a>
                        <a href="{{ route('student.delete', ['id' => $student->s_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
