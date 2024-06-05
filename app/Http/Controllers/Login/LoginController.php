<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\uservmt;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home.index');
    }

    public function login(Request $request)
    {
        $user = uservmt::where('username', $request->username)->where('password', $request->password)->first();
        if ($user) {
            return redirect()->intended('/instructor');
        }

        return redirect('/')
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Invalid username or password.']);
    }

    public function logout(Request $request)
    {
        return redirect('/');
    }
}
