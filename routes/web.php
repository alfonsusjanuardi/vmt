<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckInstructorSession;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::post('/login', 'Login\LoginController@login')->name('login.submit');
Route::get('/logout', 'Login\LoginController@logout')->name('instructor.logout');

Route::get('/instructor', 'Instructor\InstructorController@index')->middleware('check.session')->name('instructor.dashboard');

//Users
Route::get('/instructor/users', 'Users\UserController@index')->middleware('check.session')->name('user.index');
Route::get('/instructor/users/viewUser/{username}', 'Users\UserController@viewUser')->middleware('check.session');
Route::get('/instructor/users/create', 'Users\UserController@createUser')->middleware('check.session')->name('user.create');
Route::post('/instructor/users/storeUser', 'Users\UserController@storeUser')->name('user.storeUser');
Route::get('/instructor/users/updateUser/{username}', 'Users\UserController@editUser')->middleware('check.session');
Route::post('/instructor/users/updateUser', 'Users\UserController@updateUser')->name('user.updateUser');
Route::get('/instructor/users/deleteUser/{username}', 'Users\UserController@deleteUser');

//Exercises
Route::get('/instructor/exercises', 'Instructor\ExerciseController@index')->name('instructor.exercises');
Route::get('/instructor/exercises/viewExercise/{id}', 'Instructor\ExerciseController@viewExercise')->middleware('check.session')->name('exercises.viewExercise');
Route::get('/instructor/exercises/viewExercise/scenario_action/viewScenarioAction/{id}', 'Instructor\ScenarioController@viewScenarioAction');
Route::get('/instructor/exercises/create', 'Instructor\ExerciseController@createExercise')->name('exercises.create');
Route::post('/instructor/exercises/storeExercise', 'Instructor\ExerciseController@storeExercise')->name('exercises.storeExercise');
Route::get('/instructor/exercises/updateExercise/{id}', 'Instructor\ExerciseController@editExercise');
Route::post('/instructor/exercises/updateExercise', 'Instructor\ExerciseController@updateExercise')->name('exercises.updateExercise');
Route::post('/instructor/exercises/updateactionExercise', 'Instructor\ExerciseController@updateactionExercise')->name('exercises.updateactionExercise');
Route::post('/instructor/exercises/updateExerciseEnv', 'Instructor\ExerciseController@updateExerciseEnv')->name('exercises.updateExerciseEnv');
Route::get('/instructor/exercises/deleteExercise/{id}', 'Instructor\ExerciseController@deleteExercise');

//Scenarios
Route::get('/instructor/scenarios', 'Instructor\ScenarioController@index')->middleware('check.session')->name('instructor.scenarios');
Route::get('/instructor/scenarios/viewScenario/{id}', 'Instructor\ScenarioController@viewScenario');
Route::get('/instructor/scenarios/create', 'Instructor\ScenarioController@createScenario')->name('scenarios.create');
Route::post('/instructor/scenarios/storeScenario', 'Instructor\ScenarioController@storeScenario')->name('scenarios.storeScenario');
Route::get('/instructor/scenarios/updateScenario/{id}', 'Instructor\ScenarioController@editScenario');
Route::post('/instructor/scenarios/updateScenario', 'Instructor\ScenarioController@updateScenario')->name('scenarios.updateScenario');
Route::get('/instructor/scenarios/deleteScenario/{id}', 'Instructor\ScenarioController@deleteScenario');

//Scenario Action
Route::get('/instructor/scenario_action', 'Instructor\ScenarioController@loadScenarioAction')->name('instructor.scenario_action');
Route::get('/instructor/scenario_action/viewScenarioAction/{id}', 'Instructor\ScenarioController@viewScenarioAction');
Route::get('/instructor/scenario_action/create', 'Instructor\ScenarioController@createScenarioAction')->name('scenario_action.create');
Route::post('/instructor/scenario_action/storeScenarioAction', 'Instructor\ScenarioController@storeScenarioAction')->name('scenario_action.storeScenarioAction');
Route::get('/instructor/scenario_action/updateScenarioAction/{id}', 'Instructor\ScenarioController@editScenarioAction');
Route::post('/instructor/scenario_action/updateScenarioAction', 'Instructor\ScenarioController@updateScenarioAction')->name('scenario_action.updateScenarioAction');
Route::get('/instructor/scenario_action/deleteScenarioAction/{id}', 'Instructor\ScenarioController@deleteScenarioAction');

// Testing VMT
Route::get('/instructor/evaluation', 'Instructor\TestingVMTController@index')->middleware('check.session')->name('instructor.evaluation');
Route::get('/instructor/evaluation/viewListReport/{id}', 'Instructor\TestingVMTController@viewDetailReport')->middleware('check.session');
Route::get('/instructor/evaluation/viewDetailReport/{id}', 'Instructor\TestingVMTController@viewTestingVMT')->middleware('check.session');
Route::get('/instructor/evaluation/deleteDetailReport/{id}', 'Instructor\TestingVMTController@deleteDetailReport')->middleware('check.session');

//Lobby
Route::get('/instructor/lobby', 'Lobby\LobbyController@index')->middleware('check.session')->name('lobby.index');
Route::get('/instructor/lobby/status/{id_report}', 'Lobby\LobbyController@status')->middleware('check.session')->name('lobby.status');
Route::get('/instructor/lobby/getStatus/{id_report}', 'Lobby\LobbyController@getStatus')->middleware('check.session')->name('lobby.getStatus');
