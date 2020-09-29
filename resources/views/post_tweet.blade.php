<div class="d-flex flex-column align-items-center mb-5">
    <div class="tweet-box shadow-sm hidden">
        <div class="post-tweet w-100">
            <div class="d-flex flex-column align-items-center">

                <h3 class="font-weight-bold user-select-none">What's on your mind?</h3>

                <form class="text-center w-100" action="/tweets/store" method="post">
                    @csrf
                    <div class="p-1">
                        <input autocomplete="off" class="" name="topic" type="text" placeholder="Topic name..."
                               required/>
                    </div>
                    <div class="p-1">
                        <textarea class="w-100" name="message" type="text" placeholder="Your message..."
                                  data-toggle="tooltip" title="This one too."></textarea>
                    </div>
                    <input class="" type="submit" value="Tweet"/>
                </form>
            </div>
        </div>
    </div>
</div>
