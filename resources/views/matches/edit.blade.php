@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Match</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @include('flash-message')

                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('matches.update', $match->id) }}">

                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="team_id_1" class="col-md-4 control-label">Team 1</label>

                            <div class="col-md-6">

                                <select id="team_id_1" class="form-control" name="team_id_1">
                                    <option value="">Select</option>
                                    @if(isset($teams) && $teams->count() > 0)
                                    @foreach($teams as $key => $value)
                                        <option value="{{ $value }}"{{ $match->team_id_1 == $value ? " selected=selected" : "" }}>{{ $key }}</option>
                                    @endforeach
                                    @endif
                                </select>
								@if ($errors->has('team_id_1'))
									<span class="help-block">
										<strong>{{ $errors->first('team_id_1') }}</strong>
									</span>
								@endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('team_id_2') ? ' has-error' : '' }}">
                            <label for="team_id_2" class="col-md-4 control-label">Team 2</label>

                            <div class="col-md-6">
                                <select id="team_id_2" class="form-control" name="team_id_2" }}>
                                    <option value="">Select</option>
                                    @if(isset($teams) && $teams->count() > 0)
                                    @foreach($teams as $key => $value)
                                        <option value="{{ $value }}"{{ $match->team_id_2 == $value ? " selected=selected" : "" }}>{{ $key }}</option>
                                    @endforeach
                                    @endif
                                </select>
								@if ($errors->has('team_id_2'))
									<span class="help-block">
										<strong>{{ $errors->first('team_id_2') }}</strong>
									</span>
								@endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('game_type') ? ' has-error' : '' }}">
                            <label for="game_type" class="col-md-4 control-label">Team Won Toss</label>

                            <div class="col-md-6">
                                <select id="toss_winner" class="form-control" name="toss_winner">
                                    <option value="">Select</option>
                                    @if($match->toss_winner == "1")
                                        <option value="1" selected="selected">Team 1</option>
                                        <option value="2">Team 2</option>
                                    @else
                                        <option value="1">Team 1</option>
                                        <option value="2" selected="selected">Team 2</option>
                                    @endif
                                </select>

								@if ($errors->has('toss_winner'))
									<span class="help-block">
										<strong>{{ $errors->first('toss_winner') }}</strong>
									</span>
								@endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('team_batting_fist') ? ' has-error' : '' }}">
                            <label for="team_batting_fist" class="col-md-4 control-label">Team Bating First</label>

                            <div class="col-md-6">
                                <select id="team_batting_fist" class="form-control" name="team_batting_fist">

                                    <option value="">Select</option>
                                    @if($match->team_batting_fist == "1")
                                        <option value="1" selected="selected">Team 1</option>
                                        <option value="2">Team 2</option>
                                    @else
                                        <option value="1">Team 1</option>
                                        <option value="2" selected="selected">Team 2</option>
                                    @endif

                                </select>

								@if ($errors->has('team_batting_fist'))
									<span class="help-block">
										<strong>{{ $errors->first('team_batting_fist') }}</strong>
									</span>
								@endif
                            </div>

                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
