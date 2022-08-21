@php
$page_title = 'Teacher | List by Department';
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

            @foreach ($department->teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>
                        <a href="{{ route('teacher.edit', ['id' => $teacher->t_id]) }}">Edit</a>
                        <a href="{{ route('teacher.delete', ['id' => $teacher->t_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
