<?php

namespace App\Http\Controllers\Auth;

use App\Models\User as UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Check if the user is registered
    $registeredUser = UserModel::where('email', $credentials['email'])->first();
    if (!$registeredUser) {
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/profiles/create');
    }

    return redirect()->back()->withInput()->withErrors([
        'email' => 'Invalid email or password.',
    ]);
}


    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
