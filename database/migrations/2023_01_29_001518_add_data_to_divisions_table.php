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
        Schema::table('divisions', function (Blueprint $table) {
            $table->renameColumn('divison_name', 'division_name');
        });

        DB::table('divisions')->insert([
            ['division_name' => 'Division 1', 'id' => 1],
            ['division_name' => 'Division 2', 'id' => 2],
            ['division_name' => 'Division 3', 'id' => 3],
            ['division_name' => 'Division 4', 'id' => 4],
            ['division_name' => 'Division 5', 'id' => 5],
            ['division_name' => 'Division 6', 'id' => 6],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('divisions', function (Blueprint $table) {
            $table->renameColumn('division_name','divison_name');
        });
        DB::table('divisions')->delete();
    }
};
