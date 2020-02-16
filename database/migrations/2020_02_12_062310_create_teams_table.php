<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
            $table->string('logo_uri');
            $table->integer('matches')->unsigned()->default(0);
            $table->integer('win')->unsigned()->default(0);
            $table->integer('tie')->nullable()->unsigned()->default(0);
            $table->integer('loss')->unsigned()->default(0);
            $table->integer('points')->unsigned()->default(0)->comment('win=2, tie=1, loss=0');
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
        Schema::dropIfExists('teams');
    }
}
