<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MatchesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_match_is_added_to_matches_table()
    {
        $match = factory('App\Match')->create();
        $this->assertDatabaseHas('matches', [
            'id' => $match->id
        ]);
    }

     /** @test */
    public function a_user_can_see_matches()
    {
        $match = factory('App\Match')->create();
        $this->get('/matches')->assertSee($match->team1->name);
    }

    /** @test */
    public function a_user_can_see_a_match()
    {
        $match = factory('App\Match')->create();
        $this->get('/match/'.$match->id)->assertSee($match->team1->name);
    }


}
