<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('image_uri');
            $table->integer('jersey_num');
            $table->string('country_code', 2)->nullable();
            $table->integer('match_played')->unsigned()->default(0);
            $table->integer('num_inings')->unsigned()->default(0);
            $table->integer('tot_runs')->unsigned()->default(0);
            $table->integer('tot_balls_faced')->unsigned()->default(0);
            $table->integer('tot_fours')->unsigned()->default(0);
            $table->integer('tot_sixes')->unsigned()->default(0);
            $table->integer('num_fifties')->unsigned()->default(0);
            $table->integer('num_hundreds')->unsigned()->default(0);
            $table->integer('highest_score')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
