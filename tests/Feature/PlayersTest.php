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

    /** @test */
    public function a_player_is_added_to_players_table()
    {
        $player = factory('App\Player')->create();
        $this->assertDatabaseHas('players', [
            'first_name' => $player->first_name
        ]);
    }


     /** @test */
    public function a_user_can_see_player()
    {
        $player = factory('App\Player')->create();
        $this->get(route('team.show', $player->team_id))->assertSee($player->first_name);
    }
}
