<?php
namespace App\Http\ViewComposers;

use App\Team;

class TeamListComposer
{

    public function compose($view)
    {
        $view->with('teams', Team::all());
    }
}
