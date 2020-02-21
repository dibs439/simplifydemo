@extends('layouts.app')

@section('content')
<div class="container">
    <h1> {{ $match->team1->name ?? '' }} vs {{ $match->team2->name ?? '' }} </h1>
    <div class="text-right"><a href="{{ route('matches.score', $match->id) }}">Enter Scores</a></div>

    <div class="row justify-content-center">

        <h5>Scorecard of this match</h5>
        @if(isset($match->playerScores) && $match->playerScores->count() > 0)
        @php($playerScores = $match->playerScores)

        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold"><a href="{{ route('teams.show', $match->team1->id) }}">{{ $match->team1->name ?? '' }}</a></div>

                <div class="card-body">
                    <h2>{{ $match->team1->name ?? '' }}</h2>
                    {{ $match->runs_team_1 ?? '' }}/{{ $match->wickets_team_1 ?? '' }} ({{ $match->overs_team_1 ?? '' }})

                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Image</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Jersey No.</th>
                              <th>Runs</th>
                              <th>Balls</th>
                              <th>4s</th>
                              <th>6s</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($playerScores as $playerScore)
                            @if($playerScore->player->team_id == $match->team_id_1)
                            <tr>
                              <td>{{ $playerScore->player->id }}</td>
                              <td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($playerScore->player->country_code).'/'.$playerScore->player->image_uri) }}" alt="{{ $playerScore->player->first_name.' '.$playerScore->player->last_name }}" style="width:75px;" /></td>
                              <td>{{ $playerScore->player->first_name }}</td>
                              <td>{{ $playerScore->player->last_name }}</td>
                              <td class="text-center">{{ $playerScore->player->jersey_num }}</td>
                              <td class="text-success text-cente font-weight-bold">{{ $playerScore->runs }}</td>
                              <td class="text-danger text-cente font-weight-bold">{{ $playerScore->balls }}</td>
                              <td class="text-center">{{ $playerScore->fours }}</td>
                              <td class="text-center">{{ $playerScore->sixes }}</td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold"><a href="{{ route('teams.show', $match->team2->id) }}">{{ $match->team2->name ?? '' }}</a></div>


                <div class="card-body">
                    <h2>{{ $match->team2->name ?? '' }}</h2>
                    {{ $match->runs_team_2 ?? '' }}/{{ $match->wickets_team_2 ?? '' }} ({{ $match->overs_team_2 ?? '' }})

                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Logo</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Jersey No.</th>
                              <th>Runs</th>
                              <th>Balls</th>
                              <th>4s</th>
                              <th>6s</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($playerScores as $playerScore)
                            @if($playerScore->player->team_id == $match->team_id_2)
                            <tr>
                              <td>{{ $playerScore->player->id }}</td>
                              <td class="text-center"><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($playerScore->player->country_code).'/'.$playerScore->player->image_uri) }}" alt="{{ $playerScore->player->first_name.' '.$playerScore->player->last_name }}" style="width:75px;" /></td>
                              <td>{{ $playerScore->player->first_name }}</td>
                              <td>{{ $playerScore->player->last_name }}</td>
                              <td class="text-center">{{ $playerScore->player->jersey_num }}</td>
                              <td class="text-center text-success font-weight-bold">{{ $playerScore->runs }}</td>
                              <td class="text-center text-danger font-weight-bold">{{ $playerScore->balls }}</td>
                              <td class="text-center">{{ $playerScore->fours }}</td>
                              <td class="text-center">{{ $playerScore->sixes }}</td>
                            </tr>
                            @endif

                            @endforeach
                          </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
