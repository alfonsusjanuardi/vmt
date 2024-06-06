<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\testingvmt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestingVMTController extends Controller
{
    public function index()
    {
        $userID = session('user_id');
        $testingvmt = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                    ->select('testingvmt.*', 'exercise.project_name')
                    ->get();

        return view('instructor.testingvmt.index', ['testingvmt' => $testingvmt, 'userID' => $userID]);
    }

    public function viewTestingVMT($id) {
        $userID = session('user_id');
        $viewTestingVMT = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                        ->select('testingvmt.*', 'exercise.project_name')
                        ->where('id', $id)
                        ->get();
        return view('instructor.testingvmt.viewTestingVMT', ['viewTestingVMT' => $viewTestingVMT, 'userID' => $userID]);
    }
}