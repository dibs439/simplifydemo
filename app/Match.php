<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

    public function Team1() {
    	return $this->belongsTo('App\Team', 'team_id_1', 'id');
    }

    public function Team2() {
    	return $this->belongsTo('App\Team', 'team_id_2', 'id');
    }

}
