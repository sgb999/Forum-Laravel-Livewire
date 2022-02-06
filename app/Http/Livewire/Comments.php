<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $post_id;
    public $comment;
    public $disabled = false;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'comment' => ['required', 'string', 'min:4'],
        'post_id' => ['required', 'numeric', 'exists:posts,id']
    ];

    public function render()
    {
        return view('livewire.comments');
    }
    public function comments()
    {
        if(empty($this->comments)){
        return Comment::where('post_id', $this->post_id)
            ->with('user')
            ->orderBy('created_at', 'ASC')
            ->paginate(10);
        }
    }

    public function store()
    {
        $this->validate();

        Comment::create([
           'comment' => $this->comment,
           'post_id' => $this->post_id,
           'user_id' => auth()->id()
       ]);
        $this->comment = null;
        session()->flash('success', 'Your comment has been added');
    }
}
