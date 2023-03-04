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
        Schema::table('sessions', function (Blueprint $table) {
            //
        });

        DB::table('sessions')->insert([
            ['session_name' => 'Session 1 2023', 'id' => 6, 'start_date'=>'2022-12-14', 'end_date'=> '2023-02-01'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            //
        });
        DB::table('sessions')->delete();
    }
};
