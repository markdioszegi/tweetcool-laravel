<div class="flex-center position-ref guest-height fade-in-bottom">
    <div class="content">
        <div class="title m-b-md">
            tweetcool
        </div>

        <div class="links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</div>

