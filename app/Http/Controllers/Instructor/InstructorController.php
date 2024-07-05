<?php

namespace App\Http\Controllers\Instructor;

use App\archive_report;
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
        $countPenilaian = archive_report::count();
        $countJoinUser = join_user::count();
        
        // Get the user ID from the session
        $userID = session('user_id');
        $name = session('name');
        $username = session('username');
        $countUser = uservmt::count();

        $countPenilaianByInstructor = archive_report::where('instructor', $username)
            ->count();

        return view('instructor.dashboard', ['countScenario' => $countScenario, 'countExercise' => $countExercise, 'userID' => $userID, 'countUser' => $countUser, 'countPenilaian' => $countPenilaian, 'countJoinUser' => $countJoinUser, 'name' => $name, 'username' => $username, 'countPenilaianByInstructor' => $countPenilaianByInstructor]);
    }
}
