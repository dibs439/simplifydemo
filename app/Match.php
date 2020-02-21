<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

    protected $fillable = ['team_id_1', 'team_id_2', 'game_type', 'toss_winner', 'team_batting_fist'];

    public function team1() {
    	return $this->belongsTo('App\Team', 'team_id_1', 'id')->with('players');
    }

    public function team2() {
    	return $this->belongsTo('App\Team', 'team_id_2', 'id')->with('players');
    }

    public function players() {
    	return $this->hasMany('App\Player');
    }

    public function playerScores() {
    	return $this->hasMany('App\PlayerScorecard', 'match_id', 'id')->with('player');
    }
}
