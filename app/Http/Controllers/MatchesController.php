<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Match;
use App\PlayerScorecard;

class MatchesController extends Controller
{
    // Lists all teams available in the system
    public function index()
    {
        $matches = Match::orderBy('id', 'desc')->with('team1', 'team2')->paginate(7);
        return view('matches.index', ['matches' => $matches]);
    }

    // Displays the players and match-ups of a team as selected by user
    public function show($id)
    {
        if(!isset($id)) {
            return redirect()->intended('/matches')->with('error', 'No match found with this id');
        }
        $match = Match::with('team1.players', 'team2.players', 'playerScores')->where('id', $id)->first();
        //dd($match->playerScores[0]->player->first_name);

        if(!isset($match)) {
            return redirect()->intended('/matches')->with('error', 'No match found with this id');
        }

        return view('matches.show', ['match' => $match]);
    }

    // Creates a new record
    public function create()
    {
        $teams = Team::get()->pluck('id','name');
        return view('matches.create', ['teams' => $teams]);
    }

    // Saves a new record in DB
    public function store(Request $request)
    {
        $rules = [
            'team_id_1'      => 'required|numeric',
            'team_id_2'      => 'required|numeric',
            //'game_type'      => 'required|numeric',
            'toss_winner'      => 'required|numeric',
            'team_batting_fist'      => 'required|numeric',
        ];

        $this->validate($request, $rules);


        $input = [
            'team_id_1' => $request['team_id_1'],
            'team_id_2' => $request['team_id_2'],
            'game_type' => '2',
            'toss_winner' => $request['toss_winner'],
            'team_batting_fist' => $request['team_batting_fist'],
        ];


        $match = Match::create($input);
        if(isset($match->id))
            return redirect()->intended(route('matches.score', $match->id))->with('success', __('Match added successfully'));

    }

    // Updates a new record
    public function edit($id)
    {
        $teams = Team::get()->pluck('id','name');
        $match = Match::findOrFail($id);
        return view('matches.edit', ['teams' => $teams, 'match' => $match]);

    }

    // Saves a current record in DB
    public function update(Request $request, $id)
    {
        $rules = [
            'team_id_1'      => 'required|numeric',
            'team_id_2'      => 'required|numeric',
            //'game_type'      => 'required|numeric',
            'toss_winner'      => 'required|numeric',
            'team_batting_fist'      => 'required|numeric',
        ];

        $this->validate($request, $rules);


        $input = [
            'team_id_1' => $request['team_id_1'],
            'team_id_2' => $request['team_id_2'],
            'game_type' => '2',
            'toss_winner' => $request['toss_winner'],
            'team_batting_fist' => $request['team_batting_fist'],
        ];


        Match::find($id)->update($input);
        return redirect()->intended(route('matches'))->with('success', __('Match updated successfully'));

    }

    // Saves a current record in DB
    public function scores(Request $request, $id)
    {
        $match = Match::where('id', $id)->with('team1', 'team2')->first();
        //dd($match);
        return view('matches.score', ['match' => $match]);
    }

    // Saves a current record in DB
    public function updateScores(Request $request, $id)
    {

        PlayerScorecard::where('match_id', $id)->delete();

        //////////////// For Team 1 ////////////////
        if(isset($request->player_id1) && count($request->player_id1) > 0) {
            $cnt = count($request->player_id1);

            $wkts1 = 0;
            $team_total_runs1 = 0;
            $team_total_balls1 = 0;
            $team_total_overs1 = 0;
            $inputs1 = NULL;
            $flag1 = true;


            for($i = 0; $i < $cnt; $i++) {

                if($wkts1 <= 11) {



                    // $input[]['match_id'] = $id;
                    // $input[]['player_id'] = $request->player_id1[$i];
                    // $input[]['runs'] = $request->runs1[$i];
                    // $input[]['balls'] = $request->balls1[$i];
                    // $input[]['fours'] = $request->fours1[$i];
                    // $input[]['sixes'] = $request->sixes1[$i];
                    // $input[]['dots'] = 0;
                    // $input[]['is_not_out'] = 0;

                    if(isset($request->player_id1[$i]) && isset($request->runs1[$i]) && isset($request->balls1[$i]) && isset($request->fours1[$i]) && isset($request->sixes1[$i]))
                    {
                        $inputs1[] = [
                            'match_id' => $id,
                            'player_id' => $request->player_id1[$i],
                            'runs'  => $request->runs1[$i],
                            'balls'  => $request->balls1[$i],
                            'fours'  => $request->fours1[$i],
                            'sixes'  => $request->sixes1[$i],
                            'dots'  => 0,
                            'is_not_out'  => 0
                        ];

                        $team_total_runs1 += $request->runs1[$i];
                        $team_total_balls1 += $request->balls1[$i];

                        $wkts1++;

                    }

                }
                else {
                    $request->session()->flash('error', 'Please enter only 11 players score for Team 1.');
                }

                $full_overs1 = intval($team_total_balls1 / 6);
                $rem_balls1 = number_format(($team_total_balls1 % 6)/10, 1);
                $team_total_overs1 = $full_overs1 + $rem_balls1;

            }



            if(isset($inputs1) && count($inputs1) > 0) {
                $inserted1 = PlayerScorecard::insert($inputs1);
            }

        }


        //////////////// For Team 2 ////////////////
        if(isset($request->player_id2) && count($request->player_id2) > 0) {
            $cnt = count($request->player_id2);
            //dd($cnt);
            $wkts2 = 0;
            $team_total_runs2 = 0;
            $team_total_balls2 = 0;
            $team_total_overs2 = 0;
            $inputs2 = NULL;

            for($i = 0; $i < $cnt; $i++) {
                if(isset($request->runs2[$i]) && $wkts2 <= 11) {
                    if(isset($request->player_id2[$i]) && isset($request->runs2[$i]) && isset($request->balls2[$i]) && isset($request->fours2[$i]) && isset($request->sixes2[$i]))
                    {

                        $inputs2[] = [
                            'match_id' => $id,
                            'player_id' => $request->player_id2[$i],
                            'runs'  => $request->runs2[$i],
                            'balls'  => $request->balls2[$i],
                            'fours'  => $request->fours2[$i],
                            'sixes'  => $request->sixes2[$i],
                            'dots'  => 0,
                            'is_not_out'  => 0
                        ];


                        $team_total_runs2 += $request->runs2[$i];
                        $team_total_balls2 += $request->balls2[$i];
                        $wkts2++;
                    }
                }
                else {
                    $request->session()->flash('error', 'Please enter only 11 players score for Team 2.');
                }
            }

            $full_overs2 = intval($team_total_balls2 / 6);
            $rem_balls2 = number_format(($team_total_balls2 % 6)/10, 1);
            $team_total_overs2 = $full_overs2 + $rem_balls2;

            if(isset($inputs2) && count($inputs2) > 0) {
                $inserted2 = PlayerScorecard::insert($inputs2);
            }

        }


        if($team_total_runs1 > $team_total_runs2) {
            $winner = '1';
        }
        else if($team_total_runs1 == $team_total_runs2) {
            $winner = '0';
        }
        else {
            $winner = '2';
        }


        if($inserted1 && $inserted2) {
            Match::where('id', $id)->update([
                'runs_team_1'  => $team_total_runs1,
                'overs_team_1'  => $team_total_overs1,
                'wickets_team_1'  => $wkts1,
                'runs_team_2'  => $team_total_runs2,
                'overs_team_2'  => $team_total_overs2,
                'wickets_team_2'  => $wkts2,
                'winning_team'  => $winner

            ]);
        }


        return redirect()->intended(route('matches.show', $id))->with('success', __('Match scorecard added successfully'));

    }


    // Deletes a record in DB
    public function destroy($id)
    {

        Match::destroy($id);
        // redirect
        return redirect()->intended('/matches')->with('success', __('Match deleted successfully'));

    }
}
