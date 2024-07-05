<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\uservmt;
use Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home.index');
    }

    public function login(Request $request)
    {
        $user = uservmt::where('username', $request->username)->where('password', $request->password)->first();
        if ($user->id_user != 1) {
            session(['user_id' => $user->id_user]);
            session(['name' => $user->name]);
            session(['username' => $user->username]);
            return redirect()->intended('/instructor');
        }
        // else{
        //     return redirect()->intended('/home.index');
        // }

        return redirect('/')
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Invalid username or password.']);
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/');
    }
}
