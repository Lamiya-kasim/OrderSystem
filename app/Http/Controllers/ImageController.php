<?php
namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('gallery', compact('images'));
    }

    public function create()
    {
        return view('upload');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $path = $request->file('image')->store('uploads', 'public');
    
        Image::create(['path' => $path]);
    
        return redirect()->route('gallery')->with('success', 'Image uploaded successfully!');
    }
    

}


