@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Matches</div>

                <div class="card-body table-responsive p-0">
                    @if(isset($matches) && $matches->count() > 0)

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th class="text-center">Team 1</th>
                          <th class="text-center">Score 1</th>
                          <th class="text-center">Score 2</th>
                          <th class="text-center">Team 2</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($matches as $match)

                        <tr>
                          <td>{{ $match->id }}</td>
                          <td class="text-center"><img src="{{ asset(env('TEAM_PIC_URL').'/'.$match->team1->logo_uri) }}" alt="{{ $match->team1->name }}" style="width:75px;" /><br />{{ $match->team1->name }}</td>
                          <td class="text-center">{{ $match->runs_team_1 ?? '' }}({{ $match->wickets_team_1 ?? '' }}) in {{ $match->overs_team_1 ?? '' }}</td>
                          <td class="text-center">{{ $match->runs_team_2 ?? '' }}({{ $match->wickets_team_2 ?? '' }}) in {{ $match->overs_team_2 ?? '' }}</td>
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
</div>
@endsection
