@extends('layouts.app')

@section('title', auth()->user()->name)

@section('content')
    <h1>My logged user name is: {{ auth()->user()->name  }}</h1>
    <h3>Should show my tweets here</h3>
@endsection
