<?php

use Illuminate\Database\Seeder;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('matches')->delete();

        \DB::table('matches')->insert(array (
            0 =>
            array (
                'id' => 1,
                'team_id_1' => '4',
                'team_id_2' => '8',
                'game_type' => '2',
                'toss_winner' => '2',
                'team_batting_fist' => '1',
                'winning_team' => '1',
                'runs_team_1' => '311',
                'overs_team_1' => '50',
                'wickets_team_1' => '8',
                'runs_team_2' => '207',
                'overs_team_2' => '39.5',
                'wickets_team_2' => '10',
            ),
            1 =>
            array (
                'id' => 2,
                'team_id_1' => '5',
                'team_id_2' => '2',
                'game_type' => '2',
                'toss_winner' => '1',
                'team_batting_fist' => '1',
                'winning_team' => '1',
                'runs_team_1' => '352',
                'overs_team_1' => '50',
                'wickets_team_1' => '5',
                'runs_team_2' => '316',
                'overs_team_2' => '50',
                'wickets_team_2' => '10',
            ),
            2 =>
            array (
                'id' => 3,
                'team_id_1' => '2',
                'team_id_2' => '4',
                'game_type' => '2',
                'toss_winner' => '1',
                'team_batting_fist' => '1',
                'winning_team' => '1',
                'runs_team_1' => '285',
                'overs_team_1' => '50',
                'wickets_team_1' => '7',
                'runs_team_2' => '221',
                'overs_team_2' => '44.4',
                'wickets_team_2' => '10',
            ),
            3 =>
            array (
                'id' => 4,
                'team_id_1' => '8',
                'team_id_2' => '5',
                'game_type' => '2',
                'toss_winner' => '1',
                'team_batting_fist' => '1',
                'winning_team' => '2',
                'runs_team_1' => '227',
                'overs_team_1' => '50',
                'wickets_team_1' => '9',
                'runs_team_2' => '230',
                'overs_team_2' => '47.3',
                'wickets_team_2' => '4',
            ),
            4 =>
            array (
                'id' => 5,
                'team_id_1' => '4',
                'team_id_2' => '5',
                'game_type' => '2',
                'toss_winner' => '1',
                'team_batting_fist' => '1',
                'winning_team' => '1',
                'runs_team_1' => '337',
                'overs_team_1' => '50',
                'wickets_team_1' => '7',
                'runs_team_2' => '306',
                'overs_team_2' => '50',
                'wickets_team_2' => '5',
            ),
            5 =>
            array (
                'id' => 6,
                'team_id_1' => '8',
                'team_id_2' => '2',
                'game_type' => '2',
                'toss_winner' => '1',
                'team_batting_fist' => '1',
                'winning_team' => '1',
                'runs_team_1' => '325',
                'overs_team_1' => '50',
                'wickets_team_1' => '6',
                'runs_team_2' => '315',
                'overs_team_2' => '49.5',
                'wickets_team_2' => '10',
            ),

            /*6 =>
            array (
                'id' => 7,
                'team_1' => '',
                'team_2' => '',
                'game_type' => '',
                'toss_winner' => '',
                'team_batting_fist' => '',
                'winning_team' => '',
            ),
            7 =>
            array (
                'id' => 8,
                'team_1' => '',
                'team_2' => '',
                'game_type' => '',
                'toss_winner' => '',
                'team_batting_fist' => '',
                'winning_team' => '',
            ),
            8 =>
            array (
                'id' => 9,
                'team_1' => '',
                'team_2' => '',
                'game_type' => '',
                'toss_winner' => '',
                'team_batting_fist' => '',
                'winning_team' => '',
            ),
            9 =>
            array (
                'id' => 10,
                'team_1' => '',
                'team_2' => '',
                'game_type' => '',
                'toss_winner' => '',
                'team_batting_fist' => '',
                'winning_team' => '',
            ),*/


        ));
    }
}
