<?php

namespace Tests\Feature;

use App\Http\Controllers\GameController;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
