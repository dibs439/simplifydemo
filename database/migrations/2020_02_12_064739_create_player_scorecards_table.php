<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerScorecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_scorecards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('match_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->integer('runs')->unsigned();
            $table->integer('balls')->unsigned();
            $table->integer('fours')->unsigned();
            $table->integer('sixes')->unsigned();
            $table->integer('dots')->unsigned();
            $table->boolean('is_not_out')->default(false);
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_scorecards');
    }
}
