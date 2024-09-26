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
        $viewjoin = join_user::get();
        $join_user = join_user::join('uservmt', 'uservmt.username', 'join_user.username')
            ->select('uservmt.*', 'join_user.*')
            ->get();


        return view('instructor.lobby.index', ['userID' => $userID, 'join_user' => $join_user, 'name' => $name, 'username' => $username, 'viewjoin' => $viewjoin]);
    }

    public function status($id_report)
    {
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');

        $cariins = join_user::join('uservmt', 'uservmt.username', '=', 'join_user.username')
            ->select('join_user.*', 'uservmt.*') // Mengambil kolom yang dibutuhkan
            // ->where('join_user.id_report', $id_report)
            ->where('uservmt.username', 'LIKE', 'ins%')
            ->orderBy('join_user.room_id')
            ->get();

        $cariuser = join_user::join('uservmt', 'uservmt.id_exercise', '=',  DB::raw('CAST(join_user.id_exercise AS INTEGER)'))
            ->select('join_user.*', 'uservmt.*')
            ->where('join_user.id_report', $id_report)
            ->get();

        $total = testingvmt::where('id_report', $id_report)->where('status')->count();
        $selesai = testingvmt::where('id_report', $id_report)
                ->where('status', 'Selesai')
                ->count();
        
        $hitung = $total > 0 ? ($selesai / $total) * 100 : 0;
        

        $viewuser =  testingvmt::join('join_user', 'join_user.username', '=', 'testingvmt.username')
            ->select('testingvmt.*', 'join_user.*')
            ->where('testingvmt.id_report', $id_report)
            ->orderBy('testingvmt.id')
            ->first();

        $viewTestingVMT = testingvmt::join('join_user', 'join_user.id_report', '=', 'testingvmt.id_report')
            ->select('testingvmt.*', 'join_user.*')
            ->where('testingvmt.id_report', $id_report)
            ->orderBy('testingvmt.id')
            ->get();
        return view('instructor.lobby.status', [
            'viewTestingVMT' => $viewTestingVMT,
            'userID' => $userID,
            'name' => $name,
            'username' => $username,
            'id_report' => $id_report,
            'viewuser' => $viewuser,
            'cariins' => $cariins,
            'cariuser' => $cariuser,
            'hitung' => $hitung
        ]);
    }
    public function getStatus($id_report)
    {
        $viewTestingVMT = testingvmt::join('join_user', 'join_user.id_exercise', 'testingvmt.id_exercise')
            ->select('testingvmt.*')
            ->where('testingvmt.id_report', $id_report)
            ->orderBy('testingvmt.id')
            ->get();

        return response()->json($viewTestingVMT);
    }
    public function gethitung($id_report)
{
    $total = testingvmt::where('id_report', $id_report)->count();
    $selesai = testingvmt::where('id_report', $id_report)
            ->where('status', 'Selesai')
            ->count();
    
    $hitung = $total > 0 ? ($selesai / $total) * 100 : 0;

    return response()->json(['progression' => number_format($hitung)]);
}

}
