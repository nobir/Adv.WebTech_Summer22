@extends('layout.main')

@section('content')
    <h1>Out Team</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Dob</th>
        </tr>
        @foreach($teams as $team)
        <tr>
            <td>{{$team['id']}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['dob']}}</td>
        </tr>
        @endforeach
    </table>
@endsection