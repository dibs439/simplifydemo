<div class="text-right"><a href="{{ route('teams.create') }}">Add new team</a></div>
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
                  <td><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></td>
                  <td class="text-center">{{ $team->matches }}</td>
                  <td class="text-center">{{ $team->win }}</td>
                  <td class="text-center">{{ $team->tie }}</td>
                  <td class="text-center">{{ $team->loss }}</td>
                  <td class="text-center">{{ $team->points }}</td>
                  <td>@if(isset($team->updated_at)) {{ $team->updated_at->format('d/m/Y')   }}@endif</td>
                  <td>

                      <form class="row" method="POST" action="{{ route('teams.destroy', $team->id) }}" onsubmit = "return confirm('Are you sure to delete?')">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <a href="{{ route('teams.edit', $team->id) }}?page={{ $teams->currentPage() }}" class="btn btn-warning col-xs-5">
                        Update
                        </a>&nbsp;
                        <button type="submit" class="btn btn-danger col-xs-5">
                        Delete
                        </button>
                      </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

    </div>
    <div class="text-center">{{ $teams->links() }}</div>
</div>


