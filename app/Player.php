<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['team_id', 'first_name', 'last_name', 'jersey_num', 'image_uri'];
    public function team() {
    	return $this->belongsTo('App\Team', 'team_id', 'id');
    }
}
