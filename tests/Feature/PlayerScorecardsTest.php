<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PlayerScorecardsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_score_is_added_to_players_scorecards_table()
    {


        $match = factory('App\Match')->create();

        $player_1 = factory('App\Player')->create([
            'team_id' => $match->team_id_1,
        ]);


        $player_scorecard = factory('App\PlayerScorecard')->create([
            'match_id' => $match->id,
            'player_id' => $player_1->id
        ]);

        $this->assertDatabaseHas('player_scorecards', [
            'id' => $player_scorecard->id
        ]);

    }
}
