<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\exercise;
use App\scenario_action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index() {
        $exercise = exercise::get();
        return view('instructor.exercises.index', ['exercise' => $exercise]);
    }

    public function viewExercise($id) {
        $viewExercise = exercise::where('id_exercise', $id)->get();
        $listScenarioAction = scenario_action::where('id_exercise', $id)->get();
        $userID = session('user_id');
        return view('instructor.exercises.viewExercise', ['viewExercise' => $viewExercise, 'listScenarioAction' => $listScenarioAction, 'userID' => $userID]);
    }

    public function createExercise() {
        return view('instructor.exercises.create');
    }

    public function storeExercise(Request $request) {
        $id = exercise::max('id_exercise');
        $id = $id+1;

        exercise::create([
            'id_exercise'   => $id,
            'project_name' => $request['project_name']
        ]);

        return redirect('instructor/exercises')->with('success','Exercise created successfully!');
    }

    public function editExercise($id) {
        $editExercise = exercise::where('id_exercise',$id)->get();
        return view('instructor.exercises.updateExercise', ['editExercise' => $editExercise]);
    }

    public function updateExercise(Request $request) {
        exercise::where('id_exercise', $request->id_exercise)
                ->update([
                    'deskripsi'     => $request['deskripsi']
                ]);
        return redirect('instructor/scenarios')->with('info','Exercise updated successfully!');
    }

    public function deleteExercise($id) {
        exercise::destroy($id);

        return redirect()->back()->with('error','Exercise is deleted!');
    }
}