@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Player</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @include('flash-message')

                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('players.update',  $player->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') ?? $player->first_name }}" autofocus>

								@if ($errors->has('first_name'))
									<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
                            </div>

                        </div>


						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') ?? $player->last_name }}" autofocus>

								@if ($errors->has('last_name'))
									<span class="help-block">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
								@endif
                            </div>

                        </div>


						<div class="form-group{{ $errors->has('jersey_num') ? ' has-error' : '' }}">
                            <label for="jersey_num" class="col-md-4 control-label">Jersey Number</label>

                            <div class="col-md-6">
                                <input id="jersey_num" type="text" class="form-control" name="jersey_num" value="{{ old('jersey_num') ?? $player->jersey_num }}" autofocus>

								@if ($errors->has('jersey_num'))
									<span class="help-block">
										<strong>{{ $errors->first('jersey_num') }}</strong>
									</span>
								@endif
                            </div>

                        </div>



						<div class="form-group{{ $errors->has('image_uri') ? ' has-error' : '' }}">
                            <label for="image_uri" class="col-md-4 control-label">Upload Logo</label>

                            <div class="col-md-6">
                                <input id="image_uri" type="file" class="form-control" name="image_uri" value="">

								@if ($errors->has('image_uri'))
									<span class="help-block">
										<strong>{{ $errors->first('image_uri') }}</strong>
									</span>
								@endif
                            </div><br />
                            @if(isset($player->image_uri) && $player->image_uri != '')
                                <img src="{{ url(env('PLAYER_PIC_URL').$player->image_uri) }}" class="img-thumbnail" style="width:100px;" />
                            @endif
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
