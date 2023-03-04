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
        Schema::create('match_history', function (Blueprint $table) {
            $table->id();
            $table->date('match_date');
            $table->unsignedInteger('team_one_id');
            $table->unsignedInteger('team_two_id');
            $table->integer('team_one_goals');
            $table->integer('team_two_goals');
            $table->unsignedInteger('winner_id')->nullable();
            $table->unsignedInteger('loser_id')->nullable();
            $table->boolean('draw');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('session_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_history');
    }
};
