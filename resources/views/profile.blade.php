@extends('layouts.app')

@section('title', $user->name . '\'s page')

@section('content')
    @if(auth()->user()->getAuthIdentifier() == $user->id)
        <h1>This is your profile page</h1>
    @else
        <h1>You are viewing {{ $user->name }}'s profile</h1>
    @endif

    <h3>Should show my tweets here</h3>

    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif

    @include('tweets')
@endsection
