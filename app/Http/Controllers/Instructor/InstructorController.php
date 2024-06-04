<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\scenario;
use App\exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function index()
    {
        $countScenario = scenario::count();
        $countExercise = exercise::count();

        return view('instructor.dashboard', ['countScenario' => $countScenario, 'countExercise' => $countExercise]);
    }
}
