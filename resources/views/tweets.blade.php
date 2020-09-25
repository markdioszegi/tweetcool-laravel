<div class="d-flex flex-column align-items-center mb-3">
    @foreach($tweets as $tweet)
        <div class="tweet-box mb-5 shadow-sm hidden align-items-center">
            <div class="flex-column align-self-baseline mr-3 text-center user-bio">
                <img onclick="location.href='{{ route('profile', $tweet->user->id) }}'" class="profile-image-circle"
                     src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"/>
                <p><a href={{ route('profile', $tweet->user->id) }}>{{ $tweet->user->name }}</a></p>
            </div>
            <div class="flex-column flex-fill">
                <h3>{{ $tweet->topic }}</h3>
                <p>{{ $tweet->message }}</p>
                <small class="text-muted float-right" data-toggle="tooltip"
                       title="{{$tweet->created_at->format('d F Y h:m:s')}}">{{ $tweet->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach
</div>
