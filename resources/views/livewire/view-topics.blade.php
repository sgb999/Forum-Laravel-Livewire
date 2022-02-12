<div>
    <div wire:loading>
        <page-loader />
    </div>
    <div class="livewire-topics">
        <div wire:loading.remove.delay.shortest wire>
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
            </div>
        <div style="display: block; margin: 0 auto">
            {{ $topics->links() }}
        </div>
    </div>
</div>
