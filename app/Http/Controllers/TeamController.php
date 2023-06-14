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

    public function getSortedTeams(Request $request){

        $sortedTeamData = json_decode($request->header('data'));

        return view( 'teams', ['teams' => $sortedTeamData]);
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
        
        $data = $request->input('data');
        $values = explode('|', $data);
        
        $teamId = $values[0];
        $sessionId = $values[1];
        $divisionId = $values[2];

        $team = new Team;

        $allTeamsInDiv = $team->getAllTeamsInDivisionAndSession($divisionId, $sessionId);
        
        $teamAttributes = [];
        
        foreach ($allTeamsInDiv as $team) {
         $teamAttributes[] = $team->getAttributes();
        }

        $teamAttributesObject = collect($teamAttributes);

        return view('teams', ['teams'=> json_decode($teamAttributesObject)]);
    }
}
