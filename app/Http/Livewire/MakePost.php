<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PostController;
use App\Models\Category;
use Livewire\Component;

class MakePost extends Component
{
    public $post;

    public $title;

    public $content;

    public $category_id;

    public $categories;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'category_id' => ['required', 'exists:categories,id'],
    ];

    public function mount($post = null)
    {
        if ($post) {
            $this->title = $post->title;
            $this->content = $post->content;
            $this->categoryId = $post->category_id;
        }
        $this->categories = Category::all();
    }

    public function render()
    {
        if ($this->post) {
            $post = $this->post;

            return view('livewire.make-post', compact('post'));
        }

        return view('livewire.make-post');
    }

    public function post()
    {
        $this->validate();
        $content = [
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'user_id' => auth()->id(),
        ];
        if ($this->post) {
            $post = PostController::store($content, $this->post->id);
        } else {
            $post = PostController::store($content);
        }

        return redirect()->to(route('viewPost', $post->id));
    }
}
