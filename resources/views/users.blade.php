@extends('layouts.app')

@section('title', 'users')

@section('content')
    <div class="fade-in-bottom">
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>EMAIL VERIFIED AT</th>
                <th>REMEMBER TOKEN</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->email_verified_at}}</td>
                <td>{{$user->remember_token}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
