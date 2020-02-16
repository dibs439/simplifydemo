<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id_1')->unsigned();
            $table->integer('team_id_2')->unsigned();
            $table->enum('game_type', ['1', '2', '3'])->comment('1=Test, 2=ODI, 3=T20');
            $table->enum('toss_winner', ['1', '2']);
            $table->enum('team_batting_fist', ['1', '2']);
            $table->integer('runs_team_1')->unsigned()->default(0);
            $table->float('overs_team_1', 4, 1)->unsigned()->default(0);
            $table->integer('wickets_team_1')->unsigned()->default(0);
            $table->integer('runs_team_2')->unsigned()->default(0);
            $table->float('overs_team_2', 4, 1)->unsigned()->default(0);
            $table->integer('wickets_team_2')->unsigned()->default(0);
            $table->enum('winning_team', ['0', '1', '2']);
            $table->timestamps();

            $table->foreign('team_id_1')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('team_id_2')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
