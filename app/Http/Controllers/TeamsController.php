<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ViewComposers\TeamListComposer;
use App\Team;
use App\Match;
use Session;

class TeamsController extends Controller
{

    // Lists all teams available in the system
    public function index()
    {
        //$teams = Team::all();
        return view('teams.index');
    }


    // Creates a new record
    public function create()
    {
        return view('teams.create');

    }

    // Saves a new record in DB
    public function store(Request $request)
    {

        $rules = [
            'name'      => 'required|unique:teams',
            'logo_uri'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $input = [
            'name' => $request['name'],
        ];


        if($request->file('logo_uri'))
        {
            $image = $request->file('logo_uri');

            //$ext = strtolower($image->getClientOriginalExtension());


            $input['logo_uri'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path(env('TEAM_PIC_URL'));
            $flag = $image->move($destinationPath, $input['logo_uri']);


            if(isset($flag->filename) && $flag->filename != "")
                $input['logo_uri'] = $flag->filename;

        }

        Team::create($input);

        return redirect()->intended('/teams')->with('success', __('Team created successfully'));


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


    // Updates a new record
    public function edit(Request $request, $id)
    {

        if (!isset($id)) {
            return redirect()->intended(route('teams'));
        }

        $team = Team::findOrFail($id);


        return view('teams.edit', ['team' => $team, 'page' => $request->get('page')]);

    }

    // Saves a current record in DB
    public function update(Request $request, $id)
    {
        $rules = [
            'name'      => 'required|unique:teams,id,'.$id,
            //'logo_uri'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $input = [
            'name' => $request['name'],
        ];


        if($request->file('logo_uri'))
        {
            $image = $request->file('logo_uri');

            $input['logo_uri'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path(env('TEAM_PIC_URL'));
            $flag = $image->move($destinationPath, $input['logo_uri']);


            if(isset($flag->filename) && $flag->filename != "")
                $input['logo_uri'] = $flag->filename;

        }

        Team::find($id)->update($input);

        return redirect()->intended('/teams?page='.$request->get('page'))->with('success', __('Team created successfully'));

    }
    public function destroy($id)
    {

        Team::destroy($id);
        // redirect
        return redirect()->intended('/teams')->with('success', __('Team deleted successfully'));

    }

}
