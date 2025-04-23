<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post-form'); // Make sure this Blade view exists
    }

    public function store(Request $request)
    {
        // For now, just dump the content to check
        dd($request->input('content'));
    }
}
