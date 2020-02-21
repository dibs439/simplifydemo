@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(isset($player->id))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Players Info: {{ $player->first_name }} {{ $player->last_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover">
                          <thead>

                          </thead>
                          <tbody>
                            <tr><td>Id</th><td>{{ $player->id }}</td></tr>
                            <tr><td>Image</th><td><img src="{{ asset(env('PLAYER_PIC_URL').strtolower($player->country_code).'/'.$player->image_uri) }}" alt="{{ $player->first_name.' '.$player->last_name }}" style="width:75px;" /></td></tr>
                            <tr><td>Country Name</th><td>{{ $player->team->name }}</td></tr>
                            <tr><td>Jersey No.</th><td>{{ $player->jersey_num }}</td></tr>
                            <tr><td>Matches</th><td>{{ $player->match_played }}</td></tr>
                            <tr><td>Inings</th><td>{{ $player->num_inings }}</td></tr>
                            <tr><td>Runs Scored</th><td>{{ $player->tot_runs }}</td></tr>
                            <tr><td>Balls Faced</th><td>{{ $player->tot_balls_faced }}</td></tr>
                            <tr><td>4s</th><td>{{ $player->tot_fours }}</td></tr>
                            <tr><td>6s</th><td>{{ $player->tot_sixes }}</td></tr>
                            <tr><td>50s</th><td>{{ $player->num_fifties }}</td></tr>
                            <tr><td>100s</th><td>{{ $player->num_hundreds }}</td></tr>
                            <tr><td>Highest</th><td>{{ $player->highest_score }}</td></tr>
                            <tr><td>Updated</th><td>@if(isset($team->updated_at)) {{ $team->updated_at->format('d/m/Y')   }}@endif</td></tr>

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
