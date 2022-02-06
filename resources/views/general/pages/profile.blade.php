@include('general.layout.header')
<div class="container">
    <h1>{{ $user->username }}</h1>
    @auth
        @if($user->id == auth()->id())
        <a href="#" class="btn btn-primary">Edit profile</a>
            @endif
    @endauth
    <hr>
    @livewire('profile', ['user' => $user])
</div>
@include('general.layout.footer')
