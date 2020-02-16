<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Team;
use Tests\TestCase;

class PlayersTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test */
    public function a_user_can_see_player()
    {
        $player = factory('App\Player')->create();
        $this->get(route('team.show', $player->team_id))->assertSee($player->first_name);
    }
}
