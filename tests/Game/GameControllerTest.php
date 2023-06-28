<?php

namespace Tests\Feature;

use App\Http\Controllers\GameController;
use App\Models\Game;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAll()
    {
        $this->withoutEvents();

        $game1 = Game::create([
            'team_one_id' => 111,
            'team_two_id' => 222,
            'match_date' => '2023-06-21',
            'field_id' => 3,
            'session_id' => 4,
            'division_id' => 5,
            'team_one_name' => 'Team One',
            'team_two_name' => 'Team Two',
            'team_one_goals' => 2,
            'team_two_goals' => 1,
            'winner_id' => 111,
            'loser_id' => 222,
            'draw' => false,
        ]);

        $game2 = Game::create([
            'team_one_id' => 333,
            'team_two_id' => 444,
            'match_date' => '2023-06-22',
            'field_id' => 6,
            'session_id' => 7,
            'division_id' => 8,
            'team_one_name' => 'Team Three',
            'team_two_name' => 'Team Four',
            'team_one_goals' => 3,
            'team_two_goals' => 2,
            'winner_id' => 333,
            'loser_id' => 444,
            'draw' => false,
        ]);

        $controller = new GameController();

        $response = $controller->getAll();

        $this->assertEquals("test", $response->games);
    }

    public function testDeleteGame()
    {
        $game = Game::create([
            'team_one_id' => 1,
            'team_two_id' => 2,
            'match_date' => '2023-06-21',
            'field_id' => 3,
            'session_id' => 4,
            'division_id' => 5,
            'team_one_name' => 'Team One',
            'team_two_name' => 'Team Two',
            'team_one_goals' => 2,
            'team_two_goals' => 1,
            'winner_id' => 1,
            'loser_id' => 2,
            'draw' => false,
        ]);
        $controller = new GameController();
        $request = new Request(['id' => $game->id]);

        $response = $controller->deleteGame($request);

        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }
}
