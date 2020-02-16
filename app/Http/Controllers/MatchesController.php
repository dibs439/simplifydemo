<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Match;

class MatchesController extends Controller
{
    // Lists all teams available in the system
    public function index()
    {
        $matches = Match::with('team1', 'team2')->get();
        return view('matches.index', ['matches' => $matches]);
    }

    // Displays the players and match-ups of a team as selected by user
    public function show($id)
    {
        if(!isset($id)) {
            return redirect()->intended('/matches')->with('error', 'No match found with this id');
        }
        $match = Match::with('team1.players', 'team2.players')->where('id', $id)->first();



        if(!isset($match)) {
            return redirect()->intended('/matches')->with('error', 'No match found with this id');
        }

        return view('matches.show', ['match' => $match]);
    }
}
