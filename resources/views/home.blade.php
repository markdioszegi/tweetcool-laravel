@extends('layouts.app')

@section('title', auth()->user() ? auth()->user()->name . '\'s feed' : 'Tweetcool')

@section('content')
    @guest
        @include('welcome')
    @endguest
    <div class="container">
        @auth
            @include('post_tweet')
        @endauth

        @include('tweets')

        <div class="links">
            Want to see more? <a id="scrollToTop" href="">Log in</a>
        </div>
    </div>
@endsection
