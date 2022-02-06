<div>
    <form wire:submit.prevent="post">
        <label>Post Title</label>
        <input wire:model="title" class="form-control" rows="4">
        @error('title') <span class="alert alert-danger">{{ $message }}</span> @enderror
        <label>Post Content</label>
        <textarea wire:model="content" class="form-control" rows="4" required></textarea>
        @error('content') <span class="alert alert-danger">{{ $message }}</span> @enderror
        <label>Category</label>
        <p style="margin-bottom: 0"></p>
        <select wire:model="category_id" class="form-control-sm">
            @foreach($this->categories as $category)
                <option @if(empty($this->category_id) && $this->category_id == $category->id)
                        selected
                        @elseif(empty($this->category_id))
                            selected
                            {{$this->category_id = 1}}
                        @endif
                        value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="alert alert-danger">{{ $message }}</span> @enderror
        <p></p>
        <button @if(empty($this->title) || empty($this->content) || empty($this->category_id)) disabled @endif class="btn btn-primary" type="submit">Post</button>
    </form>
</div>
