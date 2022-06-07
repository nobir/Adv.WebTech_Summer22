@extends('layouts.main')
@section('contents')
    <h1>Users Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Dob</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>
                    <a href="{{ route('user.single', ['id' => $user->id]) }}">{{ $user->uid }}</a>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ date('d/m/Y', strtotime($user->dob)) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
            </tr>
        @endforeach
    </table>
@endsection
