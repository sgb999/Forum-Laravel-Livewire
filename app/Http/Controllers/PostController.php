<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function updatePostPage(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $page_title = 'Assassins Creed - Make a Post';

        return view('general.pages.post', compact(['page_title', 'post']));
    }

    public static function store($postRequest, $id = null)
    {
        return Post::updateOrCreate(['id' => $id], $postRequest);
    }

    public function update($id, PostStoreRequest $request)
    {
        $validated = $request->validated();
        $validated += ['user_id' => auth()->id()];
        Post::whereId($id)->update($validated);

        return redirect()->to(route('viewPost', $id));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            return redirect()->back();
        }
        $post->delete();

        return redirect()->to(route('viewTopics', $post->category_id));
    }
}
