<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function __construct(){
       if(!session()->has('posts')){
           session()->put('posts',  [
               [
                   'id' => 1,
                   'title' => 'Learn PHP',
                   'description' => 'A beginner-friendly guide to PHP fundamentals and best practices.',
                   'author' => 'Ahmed',
                   'email' => 'ahmed@example.com',
                   'created_at' => '2025-08-10 14:30:00',
               ],
               [
                   'id' => 2,
                   'title' => 'SOLID Principles',
                   'description' => 'Exploring the five SOLID OOP principles with examples and Laravel use cases.',
                   'author' => 'Mohammed',
                   'email' => 'mohammed@example.com',
                   'created_at' => '2025-08-12 09:15:00',
               ],
               [
                   'id' => 3,
                   'title' => 'Design Patterns',
                   'description' => 'An overview of common software design patterns and when to use them in SaaS projects.',
                   'author' => 'Ali',
                   'email' => 'ali@example.com',
                   'created_at' => '2025-08-14 16:45:00',
               ],
               [
                   'id' => 4,
                   'title' => 'Docker for Laravel',
                   'description' => 'A step-by-step guide to containerizing Laravel apps for local and production environments.',
                   'author' => 'Sara',
                   'email' => 'sara@example.com',
                   'created_at' => '2025-08-15 11:22:00',
               ],
               [
                   'id' => 5,
                   'title' => 'React Hooks Deep Dive',
                   'description' => 'Understanding how React hooks work under the hood and practical tips for use.',
                   'author' => 'Omar',
                   'email' => 'omar@example.com',
                   'created_at' => '2025-08-16 08:05:00',
               ],
               [
                   'id' => 6,
                   'title' => 'MySQL Optimization Tips',
                   'description' => 'Best practices for indexing, query optimization, and avoiding common performance pitfalls.',
                   'author' => 'Laila',
                   'email' => 'laila@example.com',
                   'created_at' => '2025-08-16 12:40:00',
               ],
               [
                   'id' => 7,
                   'title' => 'TypeScript for Backend APIs',
                   'description' => 'Harnessing TypeScript’s type safety when building Node.js/Express APIs.',
                   'author' => 'Youssef',
                   'email' => 'youssef@example.com',
                   'created_at' => '2025-08-17 19:55:00',
               ],
               [
                   'id' => 8,
                   'title' => 'Intro to AI in Business',
                   'description' => 'How small and medium enterprises can integrate AI for data-driven decision-making.',
                   'author' => 'Nour',
                   'email' => 'nour@example.com',
                   'created_at' => '2025-08-18 10:10:00',
               ],
               [
                   'id' => 9,
                   'title' => 'Laravel Collections Mastery',
                   'description' => 'Unlocking the full potential of Laravel’s collection methods for cleaner, faster code.',
                   'author' => 'Mohammed',
                   'email' => 'mohammed@example.com',
                   'created_at' => '2025-08-19 15:00:00',
               ],
               [
                   'id' => 10,
                   'title' => 'Security Best Practices',
                   'description' => 'Implementing CSRF, XSS, and SQL injection prevention in modern web apps.',
                   'author' => 'Ahmed',
                   'email' => 'ahmed@example.com',
                   'created_at' => '2025-08-20 18:25:00',
               ],
           ]);
        }
   }

    public function index()
    {

        $posts = session()->get('posts');

        return view('index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = session()->get('posts');
        $new_Id = end($posts)['id'] + 1;
        $posts[] = [
            'id' => $new_Id,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'email' => $request->author . '@example.com',
            'created_at' => now(),
        ];
        session()->put('posts', $posts);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = session()->get('posts')[$id-1];
        return view('show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
      $post = session()->get('posts')[$id-1];
      return view('edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $posts = session()->get('posts');
        foreach($posts as $key => $post){
            if($post['id'] == $id){
                $posts[$key]['title'] = $request->title;
                $posts[$key]['description'] = $request->description;
                $posts[$key]['author'] = $request->author;
                $posts[$key]['email'] = $request->author. '@example.com';
                $posts[$key]['created_at'] = now();
            }
        };

        session()->put('posts', $posts);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */

        public function destroy(string $id)
    {
        $posts = session()->get('posts', []);

        $posts = array_values(array_filter($posts, fn($p) => (int) $p['id'] !== (int) $id));
        session()->put('posts', $posts);

            session()->put('posts', $posts);

        return redirect()->route('posts.index');
    }

}
