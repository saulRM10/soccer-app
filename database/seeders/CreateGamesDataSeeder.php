<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class CreateGamesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specify the full path to the 'seed_data.json' file on your desktop
        $filePath ='/Users/saul/desktop/game_data.json'; // Replace with the actual path

        // Load data from the JSON file
        $jsonData = json_decode(file_get_contents($filePath), true);

        // Start custom IDs from 101 (adjust as needed)
        $customId = 101;

        // Loop through the data and insert it into the 'games' table with custom IDs
        foreach ($jsonData as $data) {
            // Assign the custom ID and increment it
            $data['id'] = $customId++;

            Game::create($data);
        }
    }
}
