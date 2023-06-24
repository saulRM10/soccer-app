<?php

namespace Tests\Feature;

use App\Http\Controllers\GameController;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAll()
    {
        $game1 = Game::factory()->create();
        $game2 = Game::factory()->create();
        $controller = new GameController();

        $response = $controller->getAll();

        $this->assertEquals(2, $response->games->count());
        $this->assertViewHas('games');
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
        $this->assertViewHas('games');
    }
}
