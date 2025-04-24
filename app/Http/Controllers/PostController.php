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
        'uploaded_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
    ]);

    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');

    if ($request->hasFile('uploaded_file')) {
        $file = $request->file('uploaded_file');
        $path = $file->store('uploads', 'public'); // storage/app/public/uploads
        $post->uploaded_file_url = '/storage/' . $path;
    }

    $post->save();

    return redirect()->route('posts.index');
}

}