@include('general.layout.header')
<div id="categories" class="container">
    <h2>Categories</h2>
    <hr>
    @foreach($categories as $category)
        <a href="{{ route('viewTopics', $category->id) }}">
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->description }}</p>
        </a>
    @endforeach
</div>
@include('general.layout.footer')
