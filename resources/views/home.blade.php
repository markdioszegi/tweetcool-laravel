@extends('layouts.app')

@section('title', auth()->user() ? auth()->user()->name . '\'s feed' : '')

@section('content')
    @guest
        @include('welcome')
    @endguest
    <div class="container fade-in-bottom">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{--
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                --}}
            </div>
        </div>
        <h1>Here should be the tweets even if the user is not logged in</h1>
        @include('tweets')
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
    <h1 class="hidden">sajtosbab:D</h1>

@endsection
