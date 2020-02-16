<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //


    public function players() {
    	return $this->hasMany('App\Player', 'team_id', 'id');
    }

    public function matchesTeam1() {
    	return $this->hasMany('App\Match', 'team_id_1', 'id');
    }

    public function matchesTeam2() {
    	return $this->hasMany('App\Match', 'team_id_2', 'id');
    }

    public function scores() {
    	return $this->hasManyThrough('App\PlayerScorecard', 'App\Player');
    }
}
