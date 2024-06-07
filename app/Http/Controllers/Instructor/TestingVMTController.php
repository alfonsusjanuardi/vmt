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
        $name = session('name');
        // $testingvmt = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
        //             ->select('testingvmt.*', 'exercise.project_name')
        //             ->get();
        $testingvmt = testingvmt::join('uservmt', 'uservmt.username', 'testingvmt.username')
                    ->select('testingvmt.username', 'uservmt.name')->distinct()->get();
        return view('instructor.testingvmt.index', ['testingvmt' => $testingvmt, 'userID' => $userID, 'name' => $name]);
    }

    public function viewDetailReport($username) {
        $userID = session('user_id');
        $name = session('name');
        $viewDetailReport = archive_report::join('uservmt', 'uservmt.username', 'archive_report.student')
                        ->select('archive_report.*', 'uservmt.name')
                        ->where('student', $username)->get();
        return view('instructor.testingvmt.viewDetailReport', ['viewDetailReport' => $viewDetailReport, 'userID' => $userID, 'name' => $name]);
    }

    public function viewTestingVMT($username) {
        $userID = session('user_id');
        $name = session('name');
        $detailUser = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                    ->join('archive_report', 'archive_report.id_action', '=', 'testingvmt.id_report')
                    ->join('uservmt', 'uservmt.username', 'testingvmt.username')
                    ->select('testingvmt.*', 'uservmt.name', 'exercise.project_name', 'archive_report.trainingmode', 'archive_report.progress', 'archive_report.exercisemode', 'archive_report.progress', 'archive_report.duration', 'archive_report.date')
                    ->where('testingvmt.id_report', $username)->first();
        $viewTestingVMT = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                        ->join('archive_report', 'archive_report.id_action', '=', 'testingvmt.id_report')
                        ->select('testingvmt.*')
                        ->where('testingvmt.id_report', $username)
                        ->paginate(5);
        return view('instructor.testingvmt.viewTestingVMT', ['viewTestingVMT' => $viewTestingVMT, 'userID' => $userID, 'detailUser' => $detailUser, 'name' => $name]);
    }
}