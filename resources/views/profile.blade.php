@extends('layouts.app')

@section('title', $user->name . '\'s page')

@section('content')
    @if(auth()->user()->getAuthIdentifier() == $user->id)
        <h1>You are viewing your own profile page</h1>
        @include('post_tweet')
    @else
        <h1>You are viewing {{ $user->name }}'s profile</h1>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif

    @include('tweets')
@endsection
