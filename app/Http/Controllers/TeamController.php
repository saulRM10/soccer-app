<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function getAll(){
        $teams = Team::all();
        return view('teams', ['teams' => $teams]);
    }

    public function getAllTeamsInDivisionAndSession( Request $request){

        $foundTeams = new Team; 
        $formData = $request->all();
        $sessionId = $formData['session_id'];
        $divisionId = $formData['division_id'];

        $foundTeams = $foundTeams->getAllTeamsInDivisionAndSession( $divisionId ,  $sessionId );

        return view('teams', ['teams' => $foundTeams]); 

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
}
