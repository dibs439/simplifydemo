@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Team</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @include('flash-message')

                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('teams.store') }}">
                        @csrf

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Team Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
                            </div>

                        </div>



						<div class="form-group{{ $errors->has('logo_uri') ? ' has-error' : '' }}">
                            <label for="logo_uri_alt_text" class="col-md-4 control-label">Upload Logo</label>

                            <div class="col-md-6">
                                <input id="logo_uri" type="file" class="form-control" name="logo_uri" value="">

								@if ($errors->has('logo_uri'))
									<span class="help-block">
										<strong>{{ $errors->first('logo_uri') }}</strong>
									</span>
								@endif
                            </div><br />


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
