<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        echo 'my_user_name : <input value="'
        . \Illuminate\Support\Facades\Hash::make('my_password_123')
        . '">';
        exit();
        
        return view(
            'auth.login',
            [
            'title' => 'Login'
            ]
        );
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('books');

        }
        
        return back()->withErrors([
            'name' => 'Authentication error',
        ]);
    }
}
