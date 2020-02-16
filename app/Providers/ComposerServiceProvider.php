<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Team;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'partials.teams', 'App\Http\ViewComposers\TeamListComposer'
        );

        // Alternative Approach

        // View::composer('partials.teams', function ($view) {
        //     $view->with('teams', Team::all());
        // });
    }
}
