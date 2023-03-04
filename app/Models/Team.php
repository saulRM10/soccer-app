<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function getAllTeamsInDivisionAndSession($divisionId ,$sessionId){

        $teams = self::where('division_id' , $divisionId)->where('session_id', $sessionId)->get();

        return $teams; 

    }

    public function createTeam($validatedData){

        $team = new Team;
        $team->team_name = $validatedData['team_name'];
        $team->division_id = $validatedData['division_id'];
        $team->session_id = $validatedData['session_id'];
        $team->save();

        return $team;

    }

    public function getTeam($teamId) {
        $team = self::where('id', $teamId)->get()->first(); 

        return $team; 
    }
    
    public function getATeamName($teamId) {
        $teamName = self::where('id', $teamId)->get()->pluck('team_name')->first();

        return $teamName;
    }

    public function deleteTeam($id){
        $team = self::find($id);
    if ($team) {
        $team->delete();
    }
    }
}
