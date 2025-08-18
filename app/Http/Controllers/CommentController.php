<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{



    public function showAllComments($id)
    {
        $comment = Post::findOrFail($id)->comments()->with('user')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ]);
    }


    public function store(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $comment = $post->comments()->create($request->all());
        $comment->load('user');
        return response()->json([
            'status' => 'success',
            'post' => $comment
        ]);
    }

}
