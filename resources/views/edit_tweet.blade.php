@extends('layouts.app')

@section('title', 'Editing tweet (' . $tweet->id . ')')

@section('content')
    <div class="d-flex flex-column align-items-center mb-5">
        <div class="tweet-box shadow-sm hidden">
            <div class="post-tweet w-100">
                <div class="d-flex flex-column align-items-center p-3">

                    <h3 class="font-weight-bold user-select-none">Editing tweet</h3>

                    <form class="text-center w-100" action="/tweets/{{ $tweet->id }}" method="post">
                        @csrf
                        @method("put")
                        <div class="p-1">
                            <input autocomplete="off" class="" name="topic" type="text" placeholder="Topic name..."
                                   value="{{ $tweet->topic }}" required/>
                        </div>
                        <div class="p-1">
                        <textarea class="w-100" name="message" type="text" placeholder="Your message..."
                                  data-toggle="tooltip" title="This one too." required>{{ $tweet->message }}</textarea>
                        </div>
                        <input class="" type="submit" value="Update"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
