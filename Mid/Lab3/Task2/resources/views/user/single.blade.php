@extends('layouts.main')

@section('contents')
    <h1>{{ $user->name }}</h1>
    <div>
        <div>ID: {{$user->uid}}</div>
        <div>Dob: {{$user->dob}}</div>
        <div>Email: {{$user->email}}</div>
        <div>Phone: {{$user->phone}}</div>
    </div>
@endsection
