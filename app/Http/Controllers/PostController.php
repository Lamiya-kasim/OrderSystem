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
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
    ]);

    $post = new Post(); // ✅ define the object early

    $post->title = $request->input('title');
    $post->content = $request->input('content');

    // ✅ Handle file upload AFTER post is created
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('uploads', 'public');
        $post->uploaded_file_url = '/storage/' . $path;
    }

    $post->save();

    return redirect()->route('posts.index');
}
}