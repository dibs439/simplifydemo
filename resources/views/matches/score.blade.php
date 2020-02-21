@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1> {{ $match->team1->name ?? '' }} vs {{ $match->team2->name ?? '' }} </h1>

        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('matches.score', $match->id) }}">
        @csrf
            <div class="col-md-12">
                <small class="text-danger">Note: If you submit a fresh score card then the previous scorecard will be discarded for this match</small>

                <div class="card">

                    <div class="card-header font-weight-bold"><a href="{{ route('teams.show', $match->team1->id) }}">{{ $match->team1->name ?? '' }}</a></div>

                    <div class="card-body">

                        {{ $match->runs_team_1 ?? '' }}/{{ $match->wickets_team_1 ?? '' }} ({{ $match->overs_team_1 ?? '' }})

                        <div class="card-body table-responsive p-0">
                            @if(isset($match->team1->players) && $match->team1->players->count() > 0)
                            @php($players = $match->team1->players)
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
                                @foreach($players as $player)

                                <tr>
                                <td>{{ $player->id }}<input type="hidden" name="player_id1[]" id="player_id1" value="{{ $player->id }}" /></td>
                                <td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($player->country_code).'/'.$player->image_uri) }}" alt="{{ $player->first_name.' '.$player->last_name }}" style="width:75px;" /></td>
                                <td>{{ $player->first_name }}</td>
                                <td>{{ $player->last_name }}</td>
                                <td>{{ $player->jersey_num }}</td>
                                <td><input type="number" name="runs1[]" id="runs1" class="form-control"  min="0" step="1"  style="width:75px;" /></td>
                                <td><input type="number" name="balls1[]" id="balls1" class="form-control" min="0" step="1"  style="width:75px;" /></td>
                                <td><input type="number" name="fours1[]" id="fours1" class="form-control" min="0" style="width:75px;" /></td>
                                <td><input type="number" name="sixes1[]" id="sixes1" class="form-control" min="0" style="width:75px;" /></td>

                                </tr>
                                @endforeach
                            </tbody>

                            </table>
                            <input type="hidden" name="team_id_1" id="team_id_1" value="{{ $match->team1->id }}" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold"><a href="{{ route('teams.show', $match->team2->id) }}">{{ $match->team2->name ?? '' }}</a></div>

                    <div class="card-body">
                        <h2></h2>
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
                                <th>Runs</th>
                                <th>Balls</th>
                                <th>4s</th>
                                <th>6s</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)

                                <tr>
                                <td>{{ $player->id }}<input type="hidden" name="player_id2[]" id="player_id2" value="{{ $player->id }}" /></td>
                                <td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($player->country_code).'/'.$player->image_uri) }}" alt="{{ $player->first_name.' '.$player->last_name }}" style="width:75px;" /></td>
                                <td>{{ $player->first_name }}</td>
                                <td>{{ $player->last_name }}</td>
                                <td>{{ $player->jersey_num }}</td>
                                <td><input type="number" name="runs2[]" id="runs2" class="form-control" min="0" style="width:75px;" /></td>
                                <td><input type="number" name="balls2[]" id="balls2" class="form-control" min="0" style="width:75px;" /></td>
                                <td><input type="number" name="fours2[]" id="fours2" class="form-control" min="0" style="width:75px;" /></td>
                                <td><input type="number" name="sixes2[]" id="sixes2" class="form-control" min="0" style="width:75px;" /></td>

                                </tr>
                                @endforeach
                            </tbody>

                            </table>
                            <input type="hidden" name="team_id_2" id="team_id_2" value="{{ $match->team2->id }}" />
                            @endif
                        </div>
                    </div>
                </div>
            </div><br />

            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>


        </form>

    </div>
</div>

@endsection


<script src="{{ asset ('js/jquery-2.2.3.min.js') }}"></script>

