<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home.index');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
			'username' => 'required',
			'password' => 'required'
		]);
        $username = $request->username;
        $password = $request->password;
        if ($username == "instruktur" && $password == "123") {
            return redirect('instructor');
        } else {
            return redirect()->back()->withErrors(['username'=>'Username salah']);
        }

        // return redirect('instructor');
    }

    public function logout(Request $request)
    {
        return redirect('/');
    }
}
