<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        if ($request->hasFile('profile_photo')) {
            $filename = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('uploads/profile_photos'), $filename);
            $user->profile_photo = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}





