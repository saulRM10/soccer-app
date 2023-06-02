<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function getAll(){
        $teams = Team::all();
        return response()->json(['teams' => $teams]);
    }

    public function getAllTeamsInDivisionAndSession( Request $request){

        $foundTeams = new Team; 
        $sessionId = $request->header('session-Id');
        $divisionId = $request->header('Division-Id');

        $foundTeams = $foundTeams->getAllTeamsInDivisionAndSession( $divisionId ,  $sessionId );

        return response()->json($foundTeams);

    }

    // create a new team
    public function createNewTeam(Request $request ){

        $validatedData = $request->validate([
            'team_name'=> 'required|unique:teams|max:30',
            'session_id'=> 'required|numeric',
            'division_id'=> 'required|numeric',
        ]);
        
        $newTeam = new Team;
        $newTeam = $newTeam->createTeam($validatedData);

        return response()->json([
            'message'=> 'Team created successfully'
        ], 201);

    }

    public function deleteTeam(Request $request){
        
        $teamId = $request->header('team-Id');

        $team = new Team;
        $team->deleteTeam($teamId);

        
        return response()->json(['status' => 'success'], 200);
    }
}
