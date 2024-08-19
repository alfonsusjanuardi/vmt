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
        $username = session('username');
        // $testingvmt = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
        //             ->select('testingvmt.*', 'exercise.project_name')
        //             ->get();

        if ($userID == 2) {
            $testingvmt = archive_report::join('uservmt', 'uservmt.username', 'archive_report.student')
                        ->select('archive_report.student', 'uservmt.name')
                        ->distinct()
                        ->get();
            return view('instructor.evaluation.index', ['testingvmt' => $testingvmt, 'userID' => $userID, 'name' => $name, 'username' => $username]);
        } else {
            $testingvmt = archive_report::join('uservmt', 'uservmt.username', 'archive_report.student')
                        ->select('archive_report.student', 'uservmt.name')
                        ->distinct()
                        ->where('archive_report.instructor', $username)
                        ->get();
            return view('instructor.evaluation.index', ['testingvmt' => $testingvmt, 'userID' => $userID, 'name' => $name, 'username' => $username]);
        }
    }

    public function viewDetailReport($student) {
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');
        
        if ($userID == 2) {
            $viewDetailReport = archive_report::join('uservmt as students', 'students.username', '=', 'archive_report.student')
                            ->join('uservmt as instructors', 'instructors.username', '=', 'archive_report.instructor')
                            ->select('archive_report.*', 'students.name as student_name', 'instructors.name as instructor_name')
                            ->where('archive_report.student', $student)->orderBy('archive_report.id_report')->get();
            return view('instructor.evaluation.viewListReport', ['viewDetailReport' => $viewDetailReport, 'userID' => $userID, 'name' => $name, 'username' => $username]);
        } else {
            $viewDetailReport = archive_report::join('uservmt as students', 'students.username', '=', 'archive_report.student')
                            ->join('uservmt as instructors', 'instructors.username', '=', 'archive_report.instructor')
                            ->select('archive_report.*', 'students.name as student_name', 'instructors.name as instructor_name')
                            ->where('archive_report.student', $student)
                            ->where('archive_report.instructor', $username)->orderBy('archive_report.id_report')->get();
            return view('instructor.evaluation.viewListReport', ['viewDetailReport' => $viewDetailReport, 'userID' => $userID, 'name' => $name, 'username' => $username]);
        }
    }

    public function viewTestingVMT($id_report) {
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');
        $detailUser = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                    ->join('archive_report', 'archive_report.id_action', '=', 'testingvmt.id_report')
                    ->join('uservmt', 'uservmt.username', 'testingvmt.username')
                    ->select('testingvmt.*', 'uservmt.name', 'exercise.project_name', 'archive_report.trainingmode', 'archive_report.progress', 'archive_report.exercisemode', 'archive_report.progress', 'archive_report.duration', 'archive_report.date')
                    ->where('testingvmt.id_report', $id_report)->first();
        $viewTestingVMT = testingvmt::join('exercise', 'exercise.id_exercise', '=', DB::raw('CAST(testingvmt.id_exercise AS INTEGER)'))
                        ->join('archive_report', 'archive_report.id_action', '=', 'testingvmt.id_report')
                        ->select('testingvmt.*')
                        ->where('testingvmt.id_report', $id_report)
                        ->orderBy('testingvmt.id')
                        ->get();
        return view('instructor.evaluation.viewDetailReport', ['viewTestingVMT' => $viewTestingVMT, 'userID' => $userID, 'detailUser' => $detailUser, 'name' => $name, 'username' => $username]);
    }

    public function deleteDetailReport($id_action) {
        archive_report::where('id_action', $id_action)->delete();
        testingvmt::where('id_report', $id_action)->delete();

        return redirect()->back()->with('error','Evaluation is deleted!');
    }
}