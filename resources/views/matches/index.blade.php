@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('flash-message')

            <div class="text-right"><a href="{{ route('matches.create') }}">Add new match</a></div>
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
                          <td class="text-center"><img src="{{ asset(env('TEAM_PIC_URL').'/'.$match->team1->logo_uri) }}" alt="{{ $match->team1->name }}" style="width:75px;" /><br /><a href="{{ route('teams.show', $match->team_id_1) }}">{{ $match->team1->name }}</a></td>
                          <td class="text-center">{{ $match->runs_team_1 ?? '' }}({{ $match->wickets_team_1 ?? '' }}) in {{ $match->overs_team_1 ?? '' }}</td>
                          <td class="text-center">{{ $match->runs_team_2 ?? '' }}({{ $match->wickets_team_2 ?? '' }}) in {{ $match->overs_team_2 ?? '' }}</td>
                          <td class="text-center"><img src="{{ asset(env('TEAM_PIC_URL').'/'.$match->team2->logo_uri) }}" alt="{{ $match->team2->name }}" style="width:75px;" /><br /><a href="{{ route('teams.show', $match->team_id_2) }}">{{ $match->team2->name }}</a></td>
                          <td class="text-center">

                              <form class="row" method="POST" action="{{ route('matches.destroy', $match->id) }}" onsubmit = "return confirm('Are you sure to delete?')">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <a href="{{ route('matches.edit', $match->id) }}" class="btn btn-success">
                                    Edit
                                </a>&nbsp;

                                <a href="{{ route('matches.show', $match->id) }}" class="btn btn-warning">
                                    View Score
                                </a>&nbsp;
                                <a href="{{ route('matches.score', $match->id) }}" class="btn btn-info">
                                    Enter Scores
                                </a>&nbsp;
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                              </form>


                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                    <div class="text-center">{{ $matches->links() }}</div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
