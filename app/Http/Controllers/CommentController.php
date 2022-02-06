<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function getComments($id, $date)
    {
        if($date == 0)
        {
            $date = now();
        }
        $comments = Comment::with('user:id,username')
            ->select('id', 'comment', 'user_id', 'created_at')
            ->where('created_at', '<', $date)
            ->where('post_id', $id)
            ->orderByDESC('created_at')
            ->limit(20)
            ->get();

        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => ['required', 'string', 'min:4'],
            'post_id' => ['required', 'integer', 'exists:posts,id']
        ]);
        if($validator->fails()){
            return ['error' => $validator->errors()];
        }
        $validated = $validator->validated();
        $comment = Comment::create([
            'comment' => $validated['comment'],
            'post_id' => $validated['post_id'],
            'user_id' => auth()->id()
        ]);
        if($comment)
        {
            $comment = $comment->with('user:id,username')
                ->select('id', 'comment', 'user_id', 'created_at')
                ->whereId($comment->id)
                ->first();
            return response()->json(['success' => $comment]);
        }
        else
            return null;
    }
}
