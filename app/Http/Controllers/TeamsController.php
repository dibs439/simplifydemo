<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ViewComposers\TeamListComposer;
use App\Team;
use App\Match;

class TeamsController extends Controller
{
    // Lists all teams available in the system
    public function index()
    {
        //$teams = Team::all();

        return view('teams.index');
    }

    // Displays the players and match-ups of a team as selected by user
    public function show($id)
    {
        if(!isset($id)) {
            return redirect()->intended('/teams')->with('error', 'No team found with this id');
        }
        $team = Team::with('players', 'scores')->where('id', $id)->first();
        if(!isset($team)) {
            return redirect()->intended('/teams')->with('error', 'No team found with this id');
        }

        $matches = Match::with('team1', 'team2')->where('team_id_1', $id)->orWhere('team_id_2', $id)->get();

        //dd($matches);
        return view('teams.show', ['matches' => $matches, 'team' => $team]);
    }
}
