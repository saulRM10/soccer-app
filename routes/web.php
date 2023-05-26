<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
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
    return view('newTeamForm');
});

Route::get('/game', function () {
    return view('startGameForm');
});


Route::post('/newTeam' , [TeamController::class, 'createNewTeam']);

Route::get('/table', [TeamController::class, 'getAllTeamsInDivisionAndSession']);

Route::get('/games', [GameController::class, 'getAll']);

Route::get('/setUpGameForm', [GameController::class, 'setUpNewGameForm']);

Route::post('/createGame', [GameController::class, 'createNewGame']);

Route::post('/deleteGame', [GameController::class, 'deleteGame']);

Route::post('/updateGameForm', [GameController::class, 'updateGameForm']);

Route::post('/updateGame', [GameController::class, 'updateGame']);

Route::get('/allTeams', [TeamController::class, 'getAll']);