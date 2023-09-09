<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Premier League teams data for the 2022-2023 season
        $premierLeagueTeams = [
            ['team_name' => 'Arsenal'],
            ['team_name' => 'Aston Villa'],
            ['team_name' => 'Brentford'],
            ['team_name' => 'Brighton & Hove Albion'],
            ['team_name' => 'Burnley'],
            ['team_name' => 'Chelsea'],
            ['team_name' => 'Crystal Palace'],
            ['team_name' => 'Everton'],
            ['team_name' => 'Leeds United'],
            ['team_name' => 'Leicester City'],
            ['team_name' => 'Liverpool'],
            ['team_name' => 'Manchester City'],
            ['team_name' => 'Manchester United'],
            ['team_name' => 'Newcastle United'],
            ['team_name' => 'Norwich City'],
            ['team_name' => 'Southampton'],
            ['team_name' => 'Tottenham Hotspur'],
            ['team_name' => 'Watford'],
            ['team_name' => 'West Ham United'],
            ['team_name' => 'Wolverhampton Wanderers'],
        ];

        foreach ($premierLeagueTeams as $teamData) {
            // Create a new Team and set session_id and division_id
            $team = Team::create([
                'team_name' => $teamData['team_name'],
                'session_id' => 16, // session_id is 16 for the season
                'division_id' => 8, // division_id is 8 for the Premier League
            ]);
        }
    }
}
