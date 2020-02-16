<div class="card">
    <div class="card-header">List of Teams</div>

    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Played</th>
                  <th>Win</th>
                  <th>Tie</th>
                  <th>Loss</th>
                  <th>Points</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($teams as $team)
                <tr>
                  <td>{{ $team->id }}</td>
                  <td><img src="{{ asset(env('TEAM_PIC_URL').$team->logo_uri) }}" alt="{{ $team->name }}" style="width:75px;" /></td>
                  <td>{{ $team->name }}</td>
                  <td class="text-center">{{ $team->matches }}</td>
                  <td class="text-center">{{ $team->win }}</td>
                  <td class="text-center">{{ $team->tie }}</td>
                  <td class="text-center">{{ $team->loss }}</td>
                  <td class="text-center">{{ $team->points }}</td>
                  <td>@if(isset($team->updated_at)) {{ $team->updated_at->format('d/m/Y')   }}@endif</td>
                  <td><a href="{{ url('/team/'.$team->id) }} ">View</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</div>
