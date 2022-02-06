<div>
    <div class="livewire-topics">
        @foreach($topics as $topic)
            <a href="{{ route('viewPost', $topic->id) }}">
                <h3>{{$topic->title}}</h3>
            </a>
            <a href="{{ route('profile', $topic->user->username) }}">
                <p>{{$topic->user->username}}</p>
            </a>
            <a href="{{route('viewTopics', $topic->category->id)}}">
                <p>{{$topic->category->name}}</p>
            </a>
            <p>{{$topic->created_at}}</p>
            <hr>
        @endforeach
        {{ $topics->links() }}
    </div>

</div>
