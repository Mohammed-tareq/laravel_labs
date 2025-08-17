<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        Post::create($request->all());
        Session::flash('success', 'Post created successfully.');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
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

}
