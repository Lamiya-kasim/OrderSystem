<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('post-form'); // Make sure this Blade view exists
    }

    public function index()
{
    $posts = Post::latest()->get(); // fetch all posts, latest first
    return view('posts.index', compact('posts'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();

    return redirect()->route('posts.index');
}

    
}

