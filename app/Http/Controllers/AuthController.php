<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'invalid credentials']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Display the specified resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,gif,png,jpg|max:2048',
        ]);
        // if($request->hasFile('profile_image')){
        //     $image = $request['profile_image'];
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        // }
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'profile_image' => $image,
        // ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $imageName = '';
        if ($request->hasFile('profile_image')) {
            $image = $request['profile_image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $user->profile_image = $imageName;

        $user->save();
        Auth::login($user);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
