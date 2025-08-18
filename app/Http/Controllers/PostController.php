<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $posts = Post::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
       $validatedData = $request->validated();

        Post::create($validatedData);

        Session::flash('success', 'Post created successfully.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $limitPost = Post::with('user')->findOrFail($id);
        $comments = $limitPost->comments()->with('user')->latest()->limit(3)->get();
        $users = User::all();

        return view('show', compact('limitPost', 'users' , 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
       $validatedData =  $request->validated();
       $validatedData['post_id'] = $id;
       $post = Post::findOrFail($id);
        $post->update($validatedData);
        Session::flash('success', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('success', 'Post deleted successfully.');
        return redirect()->route('posts.index');
    }


    public function allDeletedPosts()
    {
        $posts = Post::onlyTrashed()->with('user')->orderBy('id', 'desc')->paginate(10);
        return view('deletedPosts', compact('posts'));
    }

    public function deleteForever($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        Comment::where("commentable_id", $post->id)->forceDelete();
        $post->forceDelete();


        Session::flash('success', 'Post deleted successfully.');
        return redirect()->route('posts.deleted');
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        Session::flash('success', 'Post restored successfully.');
        return redirect()->route('posts.deleted');
    }
}
