<?php

namespace App\Http\Controllers\Lobby;

use Session;

use App\Http\Controllers\Controller;
use App\join_user;
use App\testingvmt;
use App\uservmt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LobbyController extends Controller
{
    public function index()
    {
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');
        $viewjoin= join_user::get();
        $join_user = join_user::join('uservmt', 'uservmt.username', 'join_user.username')
                    ->select('uservmt.*', 'join_user.*')
                    ->get();
    
        
        return view('instructor.lobby.index', ['userID' => $userID, 'join_user' => $join_user, 'name' => $name, 'username' => $username, 'viewjoin'=> $viewjoin]);
    }

    public function status($id_report){
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');
       
        $viewTestingVMT = testingvmt::join('join_user', 'join_user.id_exercise','testingvmt.id_exercise')
                        ->select('testingvmt.*')
                        ->where('testingvmt.id_report', $id_report)
                        ->orderBy('testingvmt.id')
                        ->get();
        return view('instructor.lobby.status', ['viewTestingVMT' => $viewTestingVMT, 'userID' => $userID, 'name' => $name, 'username' => $username,'id_report'=>$id_report]);
    }
    public function getStatus($id_report){
        $viewTestingVMT = testingvmt::join('join_user', 'join_user.id_exercise','testingvmt.id_exercise')
        ->select('testingvmt.*')
        ->where('testingvmt.id_report', $id_report)
        ->orderBy('testingvmt.id')
        ->get();

        return response()->json($viewTestingVMT);

    }
}