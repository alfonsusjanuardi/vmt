<?php

namespace App\Http\Controllers\Lobby;

use Session;

use App\Http\Controllers\Controller;
use App\join_user;
use App\uservmt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LobbyController extends Controller
{
    public function index()
    {
        $userID = session('user_id');
        $name = session('name');
        $join_user = join_user::join('uservmt', 'uservmt.username', 'join_user.username')
                    ->select('uservmt.name', 'join_user.*')
                    ->get();
        
        return view('instructor.lobby.index', ['userID' => $userID, 'join_user' => $join_user, 'name' => $name]);
    }
}