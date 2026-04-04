<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->email = $validated['email'];
        
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Vos informations ont été mises à jour avec succès.');
    }
}
