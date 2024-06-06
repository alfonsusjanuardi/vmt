<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\scenario;
use App\exercise;
use App\uservmt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function index()
    {
        $countScenario = scenario::count();
        $countExercise = exercise::count();
        
        // Get the user ID from the session
        $userID = session('user_id');
        $countUser = uservmt::count();

        return view('instructor.dashboard', ['countScenario' => $countScenario, 'countExercise' => $countExercise, 'userID' => $userID, 'countUser' => $countUser]);
    }
}
