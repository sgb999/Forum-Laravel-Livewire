@include('general.layout.header')
<div class="content">
    <div class="container">
        @if(isset($post))
            @livewire('make-post', ['post' => $post])
        @else
            @livewire('make-post')
        @endif
    </div>
</div>
@include('general.layout.footer')
