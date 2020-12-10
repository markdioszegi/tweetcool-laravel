<div class="d-flex flex-column align-items-center mb-3">
    @foreach($tweets as $tweet)
    <div class="tweet-box mb-3 shadow-sm hidden">
        <div class="d-flex p-3 position-relative">
            <!-- User bio section -->
            <div class="align-self-baseline mr-2 text-center user-bio">
                <img onclick="location.href='{{ route('profile', $tweet->user->id) }}'" class="profile-image-circle"
                    src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" />
                <p><a href={{ route('profile', $tweet->user->id) }}>{{ $tweet->user->name }}</a></p>
                {{--<small>ID: {{ $tweet->id }}</small>--}}
            </div>
            <!-- Message section -->
            <div class="flex-fill mr-5">
                <h3>{{ $tweet->topic }}</h3>
                <p>{{ $tweet->message }}</p>
                <small class="text-muted float-right user-select-none" data-toggle="tooltip"
                    title="{{$tweet->created_at->format('d F Y h:m:s')}}">{{ $tweet->created_at->diffForHumans() }}</small>
            </div>
            <!-- Options section -->
            @if($tweet->user_id == auth()->id())
            <div class="align-self-baseline top-right">
                <div class="btn-group">
                    <button class="options p-1" role="button" id="dropdownOptionsMenu" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownOptionsMenu">
                        <button onclick='location.href="/tweets/{{ $tweet->id }}/edit"'
                            class="btn-edit-tweet w-100 text-left">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </button>
                        <button data-id="{{$tweet->id}}" data-token="{{ csrf_token() }}"
                            class="btn-delete-tweet w-100 text-left"><i class="fas fa-trash mr-2"></i>Remove
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