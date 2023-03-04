<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
        DB::table('games')->insert([
            ['id'=> 1, 
              'match_date'=>'2022-12-13',
              'team_one_id'=>1,
              'team_two_id'=> 2,
              'team_one_goals'=>3,
              'team_two_goals'=>6,
              'winner_id'=> 2,
              'loser_id'=>1,
              'draw'=>false,
              'division_id'=>4,
              'session_id'=>1,
              'field_id'=>1,
            ],
            ['id'=> 2, 
            'match_date'=>'2022-12-13',
            'team_one_id'=>3,
            'team_two_id'=> 4,
            'team_one_goals'=>4,
            'team_two_goals'=>2,
            'winner_id'=> 3,
            'loser_id'=>4,
            'draw'=>false,
            'division_id'=>4,
            'session_id'=>1,
            'field_id'=>1,
          ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
        DB::table('games')->delete();
    }
};
