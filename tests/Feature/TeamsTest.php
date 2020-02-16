<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class TeamsTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function a_team_is_added_to_teams_table()
    {
        $team = factory('App\Team')->create();
        $this->assertDatabaseHas('teams', [
            'name' => $team->name
        ]);
    }

    /** @test */
    public function a_user_can_see_teams()
    {
        $team = factory('App\Team')->create();
        $this->get('/teams')->assertSee($team->name);
    }

    /** @test */
    public function a_user_can_see_team_page()
    {
        $team = factory('App\Team')->create();
        $this->get(route('team.show', $team->id))->assertStatus(200);
    }



}
