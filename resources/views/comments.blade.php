<div class="comments-box">
    <div class="d-flex flex-column p-3">
        @if($tweet->comments->isEmpty())
            <div class="text-center font-italic">
                <p>It's really quiet there <i class="fas fa-sad-tear"></i></p>
            </div>
        @else
            @foreach($tweet->comments as $comment)
                <div class="d-flex flex-column comment-box">
                    <!-- Mini use bio-->
                    <!-- TODO styling-->
                    <div class="user-bio m-1">
                        <small><a
                                href={{ route('profile', $comment->user_id) }}>
                                {{ \App\User::find($comment->user_id)->name }}
                            </a>
                        </small>
                    </div>
                    <div class="d-flex">
                        <div class="quote">
                            <div class="message flex-fill">
                                {{ $comment->message }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If the user is the owner -->
                @if($comment->user_id == auth()->id())
                    <div class="dropdown float-right">
                        <a class="p-3" role="button" id="dropdownOptionsMenu"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownOptionsMenu">
                            <button data-id="{{$tweet->id}}" data-token="{{csrf_token()}}"
                                    class="btn-edit-tweet"><i
                                    class="fas fa-edit fa-2x"></i>Edit
                            </button>
                            <button data-id="{{$tweet->id}}" data-token="{{ csrf_token() }}"
                                    class="btn-delete-tweet"><i
                                    class="fas fa-trash fa-2x"></i>Remove
                            </button>
                        </div>
                    </div>
                @endif

            @endforeach
        @endif
        @auth
            <div class="d-flex align-items-start post-comment">
                <div class="flex-fill mr-3">
                    <textarea class="w-100" placeholder="Leave a comment..." required></textarea>
                </div>
                <button class="btn-post-comment" data-tweet-id="{{$tweet->id}}"
                        data-user-id="{{auth()->user()->getAuthIdentifier()}}"
                        data-token="{{csrf_token()}}"><i class="fas fa-paper-plane"></i>
                </button>
            </div>
        @endauth
    </div>
</div>
