<div>
    <div id="profile">
        @foreach($posts as $post)
            <a href="{{ route('viewPost', $post->id) }}">
                <h3>{{$post->title}}</h3>
            </a>
            <a href="{{ route('profile', $post->user->username) }}">
                <p>{{$post->user->username}}</p>
            </a>
            <a href="{{route('viewTopics', $post->category->id)}}">
                <p>{{$post->category->name}}</p>
            </a>
            <p>{{$post->created_at}}</p>
            <hr>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>
