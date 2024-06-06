<?php

namespace App\Http\Controllers\Instructor;

use Session;

use App\Http\Controllers\Controller;
use App\scenario;
use App\scenario_action;
use App\exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScenarioController extends Controller
{
    public function index() {
        $userID = session('user_id');
        $scenario = scenario::join('exercise', 'exercise.id_exercise', '=', 'scenario.id_exercise')
                    ->select('scenario.*', 'exercise.project_name', 'exercise.id_exercise')
                    ->get();
        return view('instructor.scenarios.index', ['scenario' => $scenario, 'userID' => $userID]);
    }

    public function viewScenario($id) {
        $viewScenario = scenario::join('exercise', 'exercise.id_exercise', 'scenario.id_exercise')
                        ->select('*', 'exercise.project_name')
                        ->where('id_scenario', $id)
                        ->get();
        return view('instructor.scenarios.viewScenario', ['viewScenario' => $viewScenario]);
    }

    public function createScenario() {
        $exercise = exercise::get();
        return view('instructor.scenarios.create', ['exercise' => $exercise]);
    }

    public function storeScenario(Request $request) {
        scenario::create([
            'scenario_name' => $request['scenario_name'],
            'id_exercise'   => $request['id_exercise']
        ]);

        return redirect('instructor/scenarios')->with('success','Scenario created successfully!');
    }

    public function editScenario($id) {
        $editScenario = scenario::where('id_scenario',$id)->get();
        $exercise = exercise::get();
        return view('instructor.scenarios.updateScenario', ['editScenario' => $editScenario, 'exercise' => $exercise]);
    }

    public function updateScenario(Request $request) {
        scenario::where('id_scenario', $request->id_scenario)
                ->update([
                    'scenario_name' => $request['scenario_name'],
                    'id_exercise'     => $request['id_exercise'],
                ]);

        return redirect('instructor/scenarios')->with('info','Scenario updated successfully!');
    }
                                             
    public function deleteScenario($id) {
        scenario::destroy($id);

        return redirect()->back()->with('error','Scenario is deleted!');
    }

    public function loadScenarioAction() {
        $scenario_action = scenario_action::join('scenario', 'scenario.id_scenario', '=', 'scenario_action.id_scenario')
                        ->join('exercise', 'exercise.id_exercise', '=', 'scenario_action.id_exercise')
                        ->select('scenario_action.*', 'scenario.scenario_name', 'exercise.project_name')
                        ->get();
        return view('instructor.scenarios.scenarioAction', ['scenario_action' => $scenario_action]);
    }

    public function viewScenarioAction($id) {
        $userID = session('user_id');
        $viewScenarioAction = scenario_action::join('scenario', 'scenario.id_scenario', '=', 'scenario_action.id_scenario')
                            ->join('exercise', 'exercise.id_exercise', '=', 'scenario_action.id_exercise')
                            ->select('scenario_action.*', 'scenario.scenario_name', 'exercise.project_name')
                            ->where('id', $id)
                            ->get();
        return view('instructor.scenarios.viewScenarioAction', ['viewScenarioAction' => $viewScenarioAction, 'userID' => $userID]);
    }

    public function createScenarioAction() {
        $exercise = exercise::get();
        $scenario = scenario::get();
        return view('instructor.scenarios.createScenarioAction', ['exercise' => $exercise, 'scenario' => $scenario]);
    }

    public function storeScenarioAction(Request $request) {
        scenario_action::create([
            'actions_name'  => $request['actions_name'],
            'id_scenario'   => $request->id_scenario,
            'id_exercise'   => $request->id_exercise,
            'media_name'    => "",
            'type'          => ""
        ]);
        return redirect('instructor/scenario_action')->with('success','Scenario Action created successfully!');
    }

    public function editScenarioAction($id) {
        $editScenarioAction = scenario_action::where('id', $id)->get();
        $scenario = scenario::get();
        $exercise = exercise::get();
        return view('instructor.scenarios.updateScenarioAction', ['editScenarioAction' => $editScenarioAction, 'scenario' => $scenario, 'exercise' => $exercise]);
    }

    public function updateScenarioAction(Request $request) {
        scenario_action::where('id', $request->id)
                        ->update([
                            'actions_name'      => $request->actions_name,
                            'id_scenario'       => $request->id_scenario,
                            'id_exercise'       => $request->id_exercise
                        ]);
    }

    public function deleteScenarioAction($id) {
        scenario_action::destroy($id);

        return redirect()->back()->with('error','Scenario action is deleted!');
    }
}