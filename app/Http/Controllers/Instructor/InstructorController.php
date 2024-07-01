<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\scenario;
use App\exercise;
use App\uservmt;
use App\testingvmt;
use App\join_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function index()
    {
        $countScenario = scenario::count();
        $countExercise = exercise::count();
        $countPenilaian = testingvmt::count();
        $countJoinUser = join_user::count();
        
        // Get the user ID from the session
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');
        $countUser = uservmt::count();

        $countPenilaianByInstructor = testingvmt::join('archive_report', 'archive_report.id_action', 'testingvmt.id_report')
            ->where('archive_report.instructor', $username)
            ->count();

        return view('instructor.dashboard', ['countScenario' => $countScenario, 'countExercise' => $countExercise, 'userID' => $userID, 'countUser' => $countUser, 'countPenilaian' => $countPenilaian, 'countJoinUser' => $countJoinUser, 'name' => $name, 'username' => $username, 'countPenilaianByInstructor' => $countPenilaianByInstructor]);
    }
}
