@extends('layouts.app')

@section('title', auth()->user() ? auth()->user()->name . '\'s feed' : 'Tweetcool')

@section('content')
    @guest
        @include('welcome')
    @endguest
    <div class="container">
        @include('tweets')
        <div class="links">
            Want to see more? <a onclick="scrollToTop" href="#">Log in</a>
        </div>
    </div>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
    <h1 class="hidden">I should fade in : D</h1>
@endsection
