@extends('layouts.app')

@section('title', auth()->user() ? auth()->user()->name . '\'s feed' : 'Tweetcool')

@section('content')
@guest
@include('welcome')
@endguest

@auth
@include('post_tweet')
@endauth

@include('tweets')

@guest
<div class="links text-center">
    <a href="/login">Log in to see more</a>
</div>
@endguest
@endsection