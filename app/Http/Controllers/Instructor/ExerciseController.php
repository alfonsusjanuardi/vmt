<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\exercise;
use App\exercise_environtment;
use App\scenario_action;
use App\scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index() {
        $exercise = exercise::get();
        return view('instructor.exercises.index', ['exercise' => $exercise]);
    }

    public function viewExercise($id) {
    // $viewExercise = exercise::where('id_exercise', $id)->get();
        $viewExercise = scenario::join('exercise', 'exercise.id_exercise', '=', 'scenario.id_exercise')
        ->select('scenario.*', 'exercise.*')
        ->where('scenario.id_exercise', $id)
        ->orderBy('scenario.id_exercise')
        ->get();
    $listScenarioAction = scenario_action::where('id_exercise', $id)->orderBy('id')->get();
    
    $viewEnv = exercise::join('exercise_environtment', 'exercise_environtment.id_exercise', '=', 'exercise.id_exercise')
                ->select('exercise_environtment.id_environtment', 'exercise_environtment.nama_environtment','exercise.selected_id_env')
                ->where('exercise.id_exercise', $id)
                ->get();
    
    $userID = session('user_id');
    $name = session('name');
    $username = session('username');
    
    return view('instructor.exercises.viewExercise', [
        'viewExercise' => $viewExercise,
        'listScenarioAction' => $listScenarioAction,
        'viewEnv' => $viewEnv,
        'userID' => $userID,
        'name' => $name,
        'username' => $username,
        'id_exercise' => $id
    ]);
        return view('instructor.exercises.viewExercise', ['viewExercise' => $viewExercise, 'listScenarioAction' => $listScenarioAction, 'userID' => $userID, 'name' => $name, 'username' => $username, 'viewEnv'=>$viewEnv,'id_exercise' => $id]);
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
        $exercise = exercise::where('id_exercise', $request->id_exercise)->first();

        $exercise->deskripsi = $request['deskripsi'];
        $exercise->sejarah_pemakaian = $request['sejarah_pemakaian'];
        $exercise->sejarah_produksi = $request['sejarah_produksi'];
        $exercise->spesifikasi = $request['spesifikasi'];
        $exercise->kinerja = $request['kinerja'];
        $exercise->persenjataan = $request['persenjataan'];
        $exercise->media_type = $request['media_type'];

        if ($request['media_type'] == 'Youtube') {
            $exercise->media_name = $request['media_link'];
        } else {
            if ($request->hasFile('media_upload')) {
            $file = $request->file('media_upload');
            $filename =  $file->getClientOriginalName();
            // $path = $file->storeAs('C:\laragon\www', $filename);
            $path = env('file_upload') . $filename;
            $file->move(env('file_upload'), $filename);
            $exercise->media_name = $filename;
            }
        }

        $exercise->save();

        return redirect()->route('exercises.viewExercise', ['id' => $request->id_exercise])->with('info', 'Exercise updated successfully!');
    }
    public function updateactionExercise(Request $request) {
        foreach ($request->actions as $key => $action) {
            $scenarioAction = scenario_action::find($action['id']);
    
            if (isset($action['actions_name'])) {
                $scenarioAction->actions_name = $action['actions_name'];
            }
    
            if (isset($action['type'])) {
                $scenarioAction->type = $action['type'];
    
                if ($action['type'] == 'Youtube') {
                    if (isset($action['media_link'])) {
                        $scenarioAction->media_name = $action['media_link'];
                    }
                } else {
                    if ($request->hasFile('actions.' . $key . '.media_upload')) {
                        $file = $request->file('actions.' . $key . '.media_upload');
                        $filename = $file->getClientOriginalName();
                        $path = env('file_upload') . $filename;
                        $file->move(env('file_upload'), $filename);
                        $scenarioAction->media_name = $filename;
                    }
                }
            }
    
            $scenarioAction->save();
        }
    
        return redirect()->route('exercises.viewExercise', ['id' => $request->id_exercise])->with('info', 'Action updated successfully!');
    }
    
    public function deleteExercise($id) {
        exercise::destroy($id);

        return redirect()->back()->with('error','Exercise is deleted!');
    }

    public function updateExerciseEnv(Request $request)
    {
        $request->validate([
            'id_exercise' => 'required|integer',
            'selected_id_env' => 'required|integer',
        ]);

        $exercise = Exercise::where('id_exercise', $request->id_exercise)->firstOrFail();

        $exercise->selected_id_env = $request->input('selected_id_env');
        $exercise->save();

        return redirect()->route('exercises.viewExercise', ['id' => $request->id_exercise])
        ->with('info', 'Environment Selected!');
    }
}