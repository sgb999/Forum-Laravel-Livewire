<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function viewTopics($id)
    {
        $page_title = 'Assassin\'s creed Forum - Topics';
        $category_id = $id;

        return view('general.pages.view-topics', compact(['page_title', 'id']));
    }

    public function viewPost(Post $post)
    {
        $page_title = 'Assassin\'s creed Forum - Post';

        return view('general.pages.view-post', compact(['page_title', 'post']));
    }

    public function postPage()
    {
        $page_title = 'Assassins Creed - Make a Post';

        return view('general.pages.post', compact(['page_title']));
    }

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
