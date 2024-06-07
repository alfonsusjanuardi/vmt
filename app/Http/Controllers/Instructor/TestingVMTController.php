<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\testingvmt;
use App\archive_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestingVMTController extends Controller
{
    public function index()
    {
        $userID = session('user_id');
        // $testingvmt = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
        //             ->select('testingvmt.*', 'exercise.project_name')
        //             ->get();
        $testingvmt = testingvmt::select('username')->distinct()->get();
        return view('instructor.testingvmt.index', ['testingvmt' => $testingvmt, 'userID' => $userID]);
    }

    public function viewTestingVMT($username) {
        $userID = session('user_id');
        $detailUser = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                    ->join('archive_report', 'archive_report.id_action', '=', 'testingvmt.id_report')
                    ->select('testingvmt.*', 'exercise.project_name', 'archive_report.trainingmode', 'archive_report.progress', 'archive_report.exercisemode', 'archive_report.progress', 'archive_report.duration', 'archive_report.date')
                    ->where('testingvmt.username', $username)->first();
        $viewTestingVMT = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                        ->join('archive_report', 'archive_report.id_action', '=', 'testingvmt.id_report')
                        ->select('testingvmt.*')
                        ->where('username', $username)
                        ->paginate(5);
        return view('instructor.testingvmt.viewTestingVMT', ['viewTestingVMT' => $viewTestingVMT, 'userID' => $userID, 'detailUser' => $detailUser]);
    }
}