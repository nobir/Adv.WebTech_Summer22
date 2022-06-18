@php
$page_title = 'Department | List';
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
                <th>Students List</th>
                <th>Action</th>
            </tr>

            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td><a href="{{ route('department.studentsByDepartment', ['id' => $department->d_id]) }}">Student
                            List</a></td>
                    <td>
                        <a href="{{ route('department.edit', ['id' => $department->d_id]) }}">Edit</a>
                        <a href="{{ route('department.delete', ['id' => $department->d_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
