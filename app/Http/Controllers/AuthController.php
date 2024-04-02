<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }

        if (Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            if (Hash::check('AttendIn2024@!', $user->password)) {
                return redirect()->route('change.password', $user->id);
            }
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showChangePasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('auth.change-password', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);
        return redirect()->route('home');
    }
}
