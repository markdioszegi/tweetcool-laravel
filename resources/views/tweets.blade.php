<div class="hidden">
    <table style="width: 100%">
        <th>ID</th>
        <th>USER_ID</th>
        <th>TOPIC</th>
        <th>MESSAGE</th>
        <th>TAGS</th>
        <th>CREATED AT</th>
        <th>UPDATED AT</th>
        @foreach($tweets as $tweet)
            <tr>
                <td>{{ $tweet->id }}</td>
                <td>{{ $tweet->user_id }}</td>
                <td>{{ $tweet->topic }}</td>
                <td>{{ $tweet->message }}</td>
                <td>{{ $tweet->tags }}</td>
                <td>{{ $tweet->created_at }}</td>
                <td>{{ $tweet->updated_at }}</td>
            </tr>
        @endforeach
    </table>
    <hr>
    {{--<table style="width: 100%">
        <th>ID</th>
        <th>USER ID</th>
        <th>TWEET ID</th>
        <th>MESSAGE</th>
        <th>CREATED AT</th>
        <th>UPDATED AT</th>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->user_id }}</td>
                <td>{{ $comment->tweet_id }}</td>
                <td>{{ $comment->message }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{ $comment->updated_at }}</td>
            </tr>
        @endforeach
    </table>--}}
</div>
