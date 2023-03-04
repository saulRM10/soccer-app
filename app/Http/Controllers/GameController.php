<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;

class GameController extends Controller
{
    public function getAll(){
        $games = Game::all();
        return view('matchHistory', ['games'=> $games]);
    }

    public function setUpNewGameForm (Request $request){

        $teams = new Team; 
        $formData = $request->all();
        $sessionId = $formData['session_id'];
        $divisionId = $formData['division_id'];

        $teams = $teams->getAllTeamsInDivisionAndSession( $divisionId ,  $sessionId );

        return view('gameForm', ['teams' => $teams]);
    }

    public function createNewGame ( Request $request){
        
        $formData = $request->all();
        $teamOneId = $formData["team_one_id"]; 
        $teamTwoId = $formData["team_two_id"];
        $matchDate = $formData["match_date"];
        $fieldId = $formData["field_id"];
        $sessionId = $formData["session_id"];
        $divisionId = $formData["division_id"];

        $teamOne = new Team; 
        $teamOneName = $teamOne->getATeamName($teamOneId);

        $teamTwo = new Team; 
        $teamTwoName = $teamTwo->getATeamName($teamTwoId);

        
        $teamOneGoals = $formData["team_one_goals"];
        $teamTwoGoals = $formData["team_two_goals"];

        if ( $teamOneGoals > $teamTwoGoals){
            $winnerId = $teamOneId; 
            $loserId  = $teamTwoId; 
            $draw = false; 
        }
        else if ($teamOneGoals < $teamTwoGoals ){
            $winnerId = $teamTwoId;  
            $loserId  = $teamOneId; 
            $draw = false; 
        } else {
            $winnerId = null; 
            $loserId = null;
            $draw = true; 
        }

        $newGame = new Game;
        $newGame = $newGame->createGame(
                $matchDate, 
                $teamOneId, 
                $teamTwoId, 
                $teamOneGoals, 
                $teamTwoGoals,
                $winnerId, 
                $loserId,
                $draw,
                $divisionId,
                $sessionId,
                $fieldId, 
                $teamOneName,
                $teamTwoName,
        );

        
        $games = Game::all();
        return view('matchHistory', ['games'=> $games]);
        
    }

    public function updateGameForm(Request $request) {
        $gameId = $request->input('id');

        $game = new Game;
        $currentGame = $game->getAgame($gameId);

        $divisionId = $currentGame->pluck('division_id')->first();
        $sessionId = $currentGame->pluck('session_id')->first();

        $teams = new Team; 
        $teams = $teams->getAllTeamsInDivisionAndSession( $divisionId ,  $sessionId );

        return view('gameFormUpdate', ['teams' => $teams , 'currentGame'=> $currentGame]);
    }

    public function updateGame(Request $request) {

        $formData = $request->all();
        $teamOneId = $formData["team_one_id"]; 
        $teamTwoId = $formData["team_two_id"];
        $matchDate = $formData["match_date"];
        $fieldId = $formData["field_id"];
        $sessionId = $formData["session_id"];
        $divisionId = $formData["division_id"];
        $gameId = $formData["game_id"];
        $teamOne = new Team; 
        $teamOneName = $teamOne->getATeamName($teamOneId);

        $teamTwo = new Team; 
        $teamTwoName = $teamTwo->getATeamName($teamTwoId);

        
        $teamOneGoals = $formData["team_one_goals"];
        $teamTwoGoals = $formData["team_two_goals"];

        if ( $teamOneGoals > $teamTwoGoals){
            $winnerId = $teamOneId; 
            $loserId  = $teamTwoId; 
            $draw = false; 
        }
        else if ($teamOneGoals < $teamTwoGoals ){
            $winnerId = $teamTwoId;  
            $loserId  = $teamOneId; 
            $draw = false; 
        } else {
            $winnerId = null; 
            $loserId = null;
            $draw = true; 
        }

        $updatedGameData = [  
        $matchDate, 
        $teamOneId, 
        $teamTwoId, 
        $teamOneGoals, 
        $teamTwoGoals,
        $winnerId, 
        $loserId,
        $draw,
        $divisionId,
        $sessionId,
        $fieldId, 
        $teamOneName,
        $teamTwoName,];

        $game = new Game; 
        $game->updateGame($gameId, $updatedGameData);

        $games = new Game; 
        $games->getGamesByDivisionAndSession( $sessionId, $divisionId);
        $games = $games->all();
        return view('matchHistory', ['games'=> $games]);

    }

    public function deleteGame(Request $request) {

        $gameId = $request->input('id');

        $game = new Game;
        $game->deleteAGame($gameId);

        $games = Game::all();
        return view('matchHistory', ['games'=> $games]);
    }

}