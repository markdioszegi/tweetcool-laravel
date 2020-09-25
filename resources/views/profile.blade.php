@extends('layouts.app')

@section('title', $user->name . '\'s page')

@section('content')
    <h1>My logged user name is: {{ $user->name  }}</h1>
    <h3>Should show my tweets here</h3>
    @include('tweets')
@endsection
