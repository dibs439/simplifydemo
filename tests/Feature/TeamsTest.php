<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class TeamsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function a_user_can_see_teams()
    {
        $team = factory('App\Team')->create();
        //$response = $this->get('/teams');
        $this->get('/teams')->assertSee($team->name);

        //$response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_see_team_page()
    {
        $team = factory('App\Team')->create();
        $this->get(route('team.show', $team->id))->assertStatus(200);
    }



}
