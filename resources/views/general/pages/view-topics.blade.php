@include('general.layout.header')
<div class="content topics">
    <div class="container">
        <div class="row">
            <h2 class="col">Topics</h2>
            @auth
                <a class="btn btn-primary col-2" href="{{ route('post') }}">Make a Post</a>
            @endauth
        </div>

    <hr>
        @livewire('view-topics', ['category_id' => $id])
    </div>
</div>
@include('general.layout.footer')
