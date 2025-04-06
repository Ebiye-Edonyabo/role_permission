<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRoles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register() 
    {
        return view('auth.register');
    }

    public function storeUser(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        
        // Generate slug from username
        $validated['slug'] = Str::slug($validated['name']);

        $user = User::create($validated);

        $user->assignRole(UserRoles::CUSTOMER->value);

        return back()->with('message', 'Registration successful!');

        // return redirect('/admin')->with('message', 'Account created successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(! Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return back()->withErrors(['password' => 'Your credentials do match']);
        }

        return redirect()->route('admin.dashboard');
    }
}
