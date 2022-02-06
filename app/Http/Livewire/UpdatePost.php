<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\PostController;
class UpdatePost extends Component
{
    public $post, $title, $content, $categoryId;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'category_id' => ['required', 'exists:categories,id']
    ];

    public function render()
    {

        return view('livewire.make-post');
    }

    public function updatePost()
    {

    }
}
