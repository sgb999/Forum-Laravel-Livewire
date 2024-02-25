<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ViewTopics extends Component
{
    use WithPagination;

    public $category_id;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $topics = Post::with('user', 'category')
            ->where('category_id', $this->category_id)
            ->orderBy('created_at', 'Desc')
            ->paginate(20);

        return view('livewire.view-topics', compact(['topics']));
    }
}
