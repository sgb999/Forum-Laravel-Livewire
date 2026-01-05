<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Profile extends Component
{
    public $user;

    public function render()
    {
        $posts = Post::with('user:id,username', 'category:id,name')
            ->select('id', 'title', 'user_id', 'category_id', 'created_at')
            ->where('user_id', $this->user->id)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.profile', compact(['posts']));
    }
}
