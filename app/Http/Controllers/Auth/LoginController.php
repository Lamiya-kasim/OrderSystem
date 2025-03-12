<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure auth.login blade file exists
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validate login inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard'); // Redirect to dashboard on success
        }

        // Return error message if authentication fails
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    /**
     * Handle logout request.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect to login page
    }
}
