@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1> {{ $match->team1->name ?? '' }} vs {{ $match->team2->name ?? '' }} </h1>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2>{{ $match->team1->name ?? '' }}</h2>
                    {{ $match->runs_team_1 ?? '' }}/{{ $match->wickets_team_1 ?? '' }} ({{ $match->overs_team_1 ?? '' }})

                    <div class="card-body table-responsive p-0">
                        @if(isset($match->team1->players) && $match->team1->players->count() > 0)
                        @php($players = $match->team1->players)
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
                              <th>Balls Faced</th>
                              <th>4s</th>
                              <th>6s</th>
                              <th>50s</th>
                              <th>100s</th>
                              <th>Highest</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($players as $player)

                            <tr>
                              <td>{{ $player->id }}</td>
                              <td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($player->country_code).'/'.$player->image_uri) }}" alt="{{ $player->first_name.' '.$player->last_name }}" style="width:75px;" /></td>
                              <td>{{ $player->first_name }}</td>
                              <td>{{ $player->last_name }}</td>
                              <td>{{ $player->jersey_num }}</td>
                              <td>{{ $player->match_played }}</td>
                              <td>{{ $player->num_inings }}</td>
                              <td>{{ $player->tot_runs }}</td>
                              <td>{{ $player->tot_balls_faced }}</td>
                              <td>{{ $player->tot_fours }}</td>
                              <td>{{ $player->tot_sixes }}</td>
                              <td>{{ $player->num_fifties }}</td>
                              <td>{{ $player->num_hundreds }}</td>
                              <td>{{ $player->highest_score }}</td>

                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2>{{ $match->team2->name ?? '' }}</h2>
                    {{ $match->runs_team_2 ?? '' }}/{{ $match->wickets_team_2 ?? '' }} ({{ $match->overs_team_2 ?? '' }})

                    <div class="card-body table-responsive p-0">
                        @if(isset($match->team2->players) && $match->team2->players->count() > 0)
                        @php($players = $match->team2->players)
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
                              <th>Balls Faced</th>
                              <th>4s</th>
                              <th>6s</th>
                              <th>50s</th>
                              <th>100s</th>
                              <th>Highest</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($players as $player)

                            <tr>
                              <td>{{ $player->id }}</td>
                              <td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($player->country_code).'/'.$player->image_uri) }}" alt="{{ $player->first_name.' '.$player->last_name }}" style="width:75px;" /></td>
                              <td>{{ $player->first_name }}</td>
                              <td>{{ $player->last_name }}</td>
                              <td>{{ $player->jersey_num }}</td>
                              <td>{{ $player->match_played }}</td>
                              <td>{{ $player->num_inings }}</td>
                              <td>{{ $player->tot_runs }}</td>
                              <td>{{ $player->tot_balls_faced }}</td>
                              <td>{{ $player->tot_fours }}</td>
                              <td>{{ $player->tot_sixes }}</td>
                              <td>{{ $player->num_fifties }}</td>
                              <td>{{ $player->num_hundreds }}</td>
                              <td>{{ $player->highest_score }}</td>
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
