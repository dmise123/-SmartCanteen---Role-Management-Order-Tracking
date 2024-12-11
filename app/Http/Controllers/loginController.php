<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index()
    {
        return view(view: "general.login");
    }

    public function checkLogin(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session for security

            // Retrieve authenticated user
            $user = Auth::user();

            // Redirect based on the user's status
            if ($user->status_user_id_status == 1) {
                return redirect()->intended('mahasiswa');
            } elseif ($user->status_user_id_status == 2) {
                return redirect()->route('homeCanteen');
            } elseif ($user->status_user_id_status == 3) {
                return redirect()->intended('admin/home');
            }

            // Default redirect if status is unmatched
            return redirect()->intended(default: '/');
        }

        // Authentication failed, return with an error message
        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message', 'You have been logged out');
    }
}
