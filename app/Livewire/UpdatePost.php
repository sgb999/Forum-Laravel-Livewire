<?php

namespace App\Livewire;

use Livewire\Component;

class UpdatePost extends Component
{
    public $post;

    public $title;

    public $content;

    public $categoryId;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'category_id' => ['required', 'exists:categories,id'],
    ];

    public function render()
    {

        return view('livewire.make-post');
    }

    public function updatePost()
    {

    }
}
