<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'team_one_id',
        'team_two_id',
        'team_one_goals',
        'team_two_goals',
        'winner_id',
        'loser_id',
        'draw',
        'division_id',
        'session_id',
        'field_id',
        'team_one_name',
        'team_two_name',
        'match_date',
    ];

    public function createGame(
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
    $teamTwoName
    ){

       $game = new Game; 
       $game->match_date = $matchDate;
       $game->team_one_id = $teamOneId;
       $game->team_two_id = $teamTwoId;
       $game->team_one_goals = $teamOneGoals;
       $game->team_two_goals = $teamTwoGoals;
       $game->winner_id = $winnerId;
       $game->loser_id = $loserId;
       $game->draw = $draw;
       $game->division_id = $divisionId;
       $game->session_id = $sessionId;
       $game->field_id = $fieldId;
       $game->team_one_name = $teamOneName;
       $game->team_two_name = $teamTwoName;
       $game->save();

    }

    public function deleteAGame($gameId){
        $game = self::find($gameId); 

        if($game){
            $game->delete();
        }
    }

    public function getAGame($gameId){
        $game = self::where('id', $gameId)->get()->first(); 

        return $game; 
    }

    public function updateGame($gameId, $updatedGameData) { 
        $game = self::find($gameId);

        $game->update([
            'match_date' => $updatedGameData[0],
            'team_one_id' => $updatedGameData[1],
            'team_two_id' => $updatedGameData[2],
            'team_one_goals' => $updatedGameData[3],
            'team_two_goals' => $updatedGameData[4],
            'winner_id' => $updatedGameData[5],
            'loser_id' => $updatedGameData[6],
            'draw' => $updatedGameData[7],
            'division_id' => $updatedGameData[8],
            'session_id' => $updatedGameData[9],
            'field_id' => $updatedGameData[10],
            'team_one_name' => $updatedGameData[11],
            'team_two_name' => $updatedGameData[12],
        ]);

    }

    public function getGamesByDivisionAndSession( $sessionId, $divisionId) {
        $games = self::where('session_id', $sessionId)->where('division_id', $divisionId)->get();

        if ($games->count() > 0 ){
            return $games; 
        }else {
             return Game::all();
        }
    }
}