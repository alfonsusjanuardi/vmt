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
        $name = session('name');
        return view('instructor.users.index', ['user' => $user, 'userID' => $userID, 'name' => $name]);
    }

    public function viewUser($username) {
        $userID = session('user_id');
        $name = session('name');
        $viewUser = uservmt::select('id_user', 'name', 'username', 'password')
                        ->where('username', $username)
                        ->get();
        return view('instructor.users.viewUser', ['viewUser' => $viewUser, 'userID' => $userID, 'name' => $name]);
    }

    public function createUser() {
        $user = uservmt::get();
        $userID = session('user_id');
        $name = session('name');
        return view('instructor.users.create', ['user' => $user, 'userID' => $userID, 'name' => $name]);
    }

    public function storeUser(Request $request) {
        uservmt::create([
            'name'          => $request['name'],
            'username'      => $request['username'],
            'password'      => $request['password'],
            'id_user'       => (int) $request['role'],
            'id_exercise'   => 0,
            'scenario'      => ""
        ]);

        return redirect('instructor/users')->with('success','User created successfully!');
    }

    public function editUser($username) {
        $userID = session('user_id');
        $name = session('name');
        $editUser = uservmt::where('username',$username)->get();
        return view('instructor.users.edit', ['editUser' => $editUser, 'userID' => $userID, 'name' => $name]);
    }

    public function updateUser(Request $request) {
        uservmt::where('username', $request->username)
                ->update([
                    'name'      => $request->name,
                    'password'  => $request->password
                ]);
        return redirect('instructor/users')->with('info','User updated successfully!');
    }

    public function deleteUser($username) {
        // Attempt to delete the user by username
        $deleted = uservmt::destroy($username);

        // Check if the deletion was successful
        if ($deleted) {
            return redirect()->back()->with('success', 'User is deleted!');
        } else {
            return redirect()->back()->with('error', 'User not found!');
        }
    }
}
