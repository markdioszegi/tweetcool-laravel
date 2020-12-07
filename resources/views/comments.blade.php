<div class="comments-container">
    <div class="d-flex flex-column p-3 position-relative">
        @if($tweet->comments->isEmpty())
        <div class="text-center font-italic">
            <p>It's really quiet there <i class="fas fa-sad-tear"></i></p>
        </div>
        @else
        <div class="mb-3">
            @foreach($tweet->comments as $comment)
            <div class="d-flex flex-column position-relative comment">
                <!-- Mini user bio-->
                <!-- TODO styling-->
                <div class="user-bio mw-100">
                    <div class="flex">
                        <small><a href={{ route('profile', $comment->user_id) }}>
                                {{ \App\User::find($comment->user_id)->name }}
                            </a>
                        </small>
                        <small>—</small>
                        {{-- Display time --}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                        <!-- If the user is the owner -->
                        @auth
                        @if($comment->user_id == auth()->id())
                        <div class="btn-group">
                            <button class="options p-1" id="dropdownOptionsMenu" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownOptionsMenu">
                                <button data-id="{{$comment->id}}" data-token="{{csrf_token()}}"
                                    class="btn-edit-comment w-100 text-left"><i class="fas fa-edit mr-2"></i>Edit
                                </button>
                                <button data-id="{{$comment->id}}" data-token="{{ csrf_token() }}"
                                    class="btn-delete-comment w-100 text-left"><i class="fas fa-trash mr-2"></i>Remove
                                </button>
                            </div>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>
                <div class="d-flex">
                    <div class="quote">
                        <div class="message flex-fill">
                            {{ $comment->message }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <!-- if the user is logged in -->
        @auth
        <div class="d-flex align-items-start post-comment">
            <div class="flex-fill mr-3">
                <textarea maxlength="300" class="w-100" placeholder="Leave a comment..." required></textarea>
            </div>
            <button class="btn-post-comment" data-tweet-id="{{$tweet->id}}"
                data-user-id="{{auth()->user()->getAuthIdentifier()}}" data-token="{{csrf_token()}}"><i
                    class="fas fa-paper-plane"></i>
            </button>
        </div>
        @endauth
    </div>
</div>