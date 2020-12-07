@extends('layouts.app')

@section('title', 'users')

@section('content')
<div class="fade-in-bottom table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">DARKMODE</th>
                <th scope="col">EMAIL VERIFIED AT</th>
                <th scope="col">REMEMBER TOKEN</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dark_mode}}</td>
                <td>{{$user->email_verified_at}}</td>
                <td>{{$user->remember_token}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection