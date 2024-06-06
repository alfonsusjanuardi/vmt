<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\uservmt;

class UserController extends Controller
{
    public function index() {
        $user = uservmt::get();
        $userID = session('user_id');
        return view('instructor.users.index', ['user' => $user, 'userID' => $userID]);
    }
}
