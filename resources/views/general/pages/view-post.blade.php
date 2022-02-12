@include('general.layout.header')
<div class="container">
    <a class="btn btn-dark" href="{{ route('viewTopics', $post->category_id) }}">Back</a>
    <h2>Post</h2>
    <hr>
        <div class="container post-page">
            <h3>{{$post->title}}</h3>
            <p>{{$post->content}}</p>
            <a href="{{route('profile', $post->user->username)}}">
                {{ $post->user->username }}
            </a>
            <p>{{ $post->created_at }}</p>
            <div class="row">
                @auth
                    @if($post->user->id == auth()->id())
                        <a href="{{route('post.update', $post->id)}}" style="color: #FFFFFF" class="btn btn-primary col-1">Edit</a>
                        <form class="col-2" action="{{ route('post.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" value="{{ $post->id }}" type="submit">Delete</button>
                        </form>
                    @endif
                @endauth
        </div>
            @livewire('comments', ['post_id' => $post->id])
    </div>
</div>
@include('general.layout.footer')
