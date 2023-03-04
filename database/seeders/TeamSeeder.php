<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $maxId = DB::table('teams')->max('id');
        for ($i = 0; $i < 10; $i++) {
            DB::table('teams')->insert([
                'id' => $maxId + $i + 1,
                'team_name' => $faker->company,
                'session_id' => 1,
                'division_id' => 2,
                'history' => json_encode([
                    'wins' => $faker->numberBetween(0, 10),
                    'losses' => $faker->numberBetween(0, 10),
                    'draws' => $faker->numberBetween(0, 10),
                ]),
            ]);
    }
  }
}
