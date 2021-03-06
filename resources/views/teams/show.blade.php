@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1> {{ $team->name }} </h1>
        <div class="col-md-12">
            <div class="text-right"><a href="{{ route('players.create', ['team_id' => $team->id, 'team_name' => $team->name]) }}">Add new player</a></div>
            <div class="card">
                <div class="card-header">Matches</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body table-responsive p-0">
                        @if(isset($matches) && $matches->count() > 0)

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th class="text-center">Team 1</th>
                              <th class="text-center">Team 2</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($matches as $match)

                            <tr>
                              <td>{{ $match->id }}</td>
                              <td class="text-center"><img src="{{ asset(env('TEAM_PIC_URL').'/'.$match->team1->logo_uri) }}" alt="{{ $match->team1->name }}" style="width:75px;" /><br />{{ $match->team1->name }}</td>
                              <td class="text-center"><img src="{{ asset(env('TEAM_PIC_URL').'/'.$match->team2->logo_uri) }}" alt="{{ $match->team2->name }}" style="width:75px;" /><br />{{ $match->team2->name }}</td>
                              <td class="text-center"><a href="{{ url('/match/'.$match->id) }} ">View</a></td>
                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br />
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Players Info: </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body table-responsive p-0">
                        @if(isset($team->players) && $team->players->count() > 0)
                        @php($players = $team->players)
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Logo</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Jersey No.</th>
                              <th>Matches</th>
                              <th>Inings</th>
                              <th>Runs Scored</th>
                              <!--<th>Balls Faced</th>
                              <th>4s</th>
                              <th>6s</th>
                              <th>50s</th>
                              <th>100s</th>-->
                              <th>Highest</th>
                              <!--<th>Updated</th>-->
                              <th>Actions</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($players as $player)

                            <tr>
                              <td>{{ $player->id }}</td>
                              <td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($player->country_code).'/'.$player->image_uri) }}" alt="{{ $player->first_name.' '.$player->last_name }}" style="width:75px;" /></td>
                              <td><a href="{{ route('players.show', $player->id) }}">{{ $player->first_name }}</a></td>
                              <td>{{ $player->last_name }}</td>
                              <td>{{ $player->jersey_num }}</td>
                              <td>{{ $player->match_played }}</td>
                              <td>{{ $player->num_inings }}</td>
                              <td>{{ $player->tot_runs }}</td>
                              <!--<td>{{ $player->tot_balls_faced }}</td>
                              <td>{{ $player->tot_fours }}</td>
                              <td>{{ $player->tot_sixes }}</td>
                              <td>{{ $player->num_fifties }}</td>
                              <td>{{ $player->num_hundreds }}</td>-->
                              <td>{{ $player->highest_score }}</td>
                              <!--<td>@if(isset($player->updated_at)) {{ $player->updated_at->format('d/m/Y')   }}@endif</td>-->
                              <td>

                                <form class="row" method="POST" action="{{ route('players.destroy', $player->id) }}" onsubmit = "return confirm('Are you sure to delete?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning col-xs-5">
                                    Update
                                    </a>&nbsp;
                                    <button type="submit" class="btn btn-danger col-xs-5">
                                    Delete
                                    </button>
                                </form>

                              </td>
                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
