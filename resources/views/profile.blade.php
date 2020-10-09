@extends('layouts.app')

@section('title', $user->name . '\'s page')

@section('content')

@auth
@if(auth()->user()->getAuthIdentifier() == $user->id)
<div class="profile text-center hidden">
    <h3>You are viewing {{ $user->name }}'s profile</h3>
    <img class="avatar" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" />
    <i>This is your profile!</i>
</div>
@include('post_tweet')
@else
<div class="profile text-center hidden">
    <h3>You are viewing {{ $user->name }}'s profile</h3>
    <img class="avatar" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" />
</div>
@endif
@endauth

@guest
<div class="profile text-center hidden">
    <h3>You are viewing {{ $user->name }}'s profile</h3>
    <img class="avatar" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" />
</div>
@endguest

@if(session('success'))
<div class="alert alert-success">
    <p>{{session('success')}}</p>
</div>
@endif

@include('tweets')
@endsection