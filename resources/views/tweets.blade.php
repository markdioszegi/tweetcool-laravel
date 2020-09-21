@extends('layouts.app')

@section('title', 'tweets')

@section('content')
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
    @endforeach
@endsection
