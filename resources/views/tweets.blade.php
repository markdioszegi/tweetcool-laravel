<div class="d-flex flex-column align-items-center mb-3">
    @foreach($tweets as $tweet)
        <div class="tweet-box mb-3 shadow-sm hidden">
            <div class="d-flex p-3">
                <!-- User bio section -->
                <div class="align-self-baseline mr-2 text-center user-bio">
                    <img onclick="location.href='{{ route('profile', $tweet->user->id) }}'"
                         class="profile-image-circle"
                         src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"/>
                    <p><a href={{ route('profile', $tweet->user->id) }}>{{ $tweet->user->name }}</a></p>
                    {{--<small>ID: {{ $tweet->id }}</small>--}}
                </div>
                <!-- Message section -->
                <div class="flex-fill">
                    <h3>{{ $tweet->topic }}</h3>
                    <p>{{ $tweet->message }}</p>
                    <small class="text-muted float-right" data-toggle="tooltip"
                           title="{{$tweet->created_at->format('d F Y h:m:s')}}">{{ $tweet->created_at->diffForHumans() }}</small>
                </div>
                <!-- Options section -->
                @if($tweet->user_id == auth()->id())
                    <div class="align-self-baseline">
                        <div class="dropdown">
                            <a class="p-3" role="button" id="dropdownOptionsMenu"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownOptionsMenu">
                                <button onclick='location.href="/tweets/{{ $tweet->id }}/edit"' class="btn-edit-tweet">
                                    <i class="fas fa-edit fa-2x"></i>Edit
                                </button>
                                <button data-id="{{$tweet->id}}" data-token="{{ csrf_token() }}"
                                        class="btn-delete-tweet"><i
                                        class="fas fa-trash fa-2x"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!--Comment section!-->
            @include('comments')
        </div>
    @endforeach

    @if(method_exists($tweets, 'links'))
        {{ $tweets->links() }}
    @endif
</div>
