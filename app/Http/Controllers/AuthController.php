<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Auto-création silencieuse si la table users est vide 
        // et qu'on essaie de se connecter avec le compte par défaut demandé
        if (User::count() == 0 && $request->email === 'demasseadmin@gmail.com') {
            User::create([
                'name' => 'Admin Demasse',
                'email' => 'demasseadmin@gmail.com',
                'password' => Hash::make('dannio'),
            ]);
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
