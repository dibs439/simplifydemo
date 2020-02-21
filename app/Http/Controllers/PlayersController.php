<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('players.create', ['team_id' => $request->get('team_id'), 'team_name' => $request->get('team_name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'team_id'        => 'required|numeric',
            'first_name'        => 'required',
            'last_name'         => 'required',
            'jersey_num'        => 'required|numeric',
            'image_uri'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $input = [
            'team_id' => $request['team_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'jersey_num' => $request['jersey_num'],
        ];


        if($request->file('image_uri'))
        {
            $image = $request->file('image_uri');

            $input['image_uri'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path(env('PLAYER_PIC_URL'));
            $flag = $image->move($destinationPath, $input['image_uri']);


            if(isset($flag->filename) && $flag->filename != "")
                $input['image_uri'] = $flag->filename;

        }

        Player::create($input);

        return redirect()->intended(route('teams.show', $request['team_id']))->with('success', __('Player added successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);
        return view('players.show', [ 'player' => $player]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!isset($id)) {
            return redirect()->intended(route('teams'));
        }

        $player = Player::findOrFail($id);


        return view('players.edit', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'jersey_num'        => 'required|numeric',
            'image_uri'         => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $input = [
            //'team_id' => $request['team_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'jersey_num' => $request['jersey_num'],
        ];


        if($request->file('image_uri'))
        {
            $image = $request->file('image_uri');

            $input['image_uri'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path(env('PLAYER_PIC_URL'));
            $flag = $image->move($destinationPath, $input['image_uri']);


            if(isset($flag->filename) && $flag->filename != "")
                $input['image_uri'] = $flag->filename;

        }

        $player = Player::find($id);
        $player->update($input);

        return redirect()->intended(route('teams.show', $player->team_id))->with('success', __('Player updated successfully'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        Player::destroy($id);
        // redirect
        return redirect()->intended(route('teams.show', $player->team_id))->with('success', __('Player deleted successfully'));

    }
}
