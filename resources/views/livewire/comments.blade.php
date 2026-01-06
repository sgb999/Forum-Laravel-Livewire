<div class="w-75">
    <h3>Comments</h3>
       @foreach($comments as $comment)
        <hr>
        <p>{{ $comment->comment }}</p>
        <a href="{{route('profile', $comment->user->username)}}">
            {{ $comment->user->username }}
        </a>
        <p>{{ $comment->created_at }}</p>
    @endforeach

    {{ $comments->links() }}
    @auth
        <form wire:submit.prevent="store">
            @csrf
            <div class="form-group">
                <label>Comment</label>
                <textarea wire:model.lazy="comment" class="form-control" rows="4" minlength="4" required></textarea>
                @error('comment') <span class="alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <p></p>
            <button class="btn btn-primary">Post Comment</button>
        </form>
    @endauth
</div>
