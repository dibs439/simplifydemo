<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerScorecard extends Model
{

    public function match() {
    	return $this->belongsTo('App\Match', 'match_id', 'id');
    }
    public function player() {
    	return $this->belongsTo('App\Player', 'player_id', 'id');
    }

}
