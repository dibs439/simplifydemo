<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('teams')->delete();

        \DB::table('teams')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Afganistan',
                'logo_uri' => 'af.jpg',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Australia',
                'logo_uri' => 'au.jpg',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Bangladesh',
                'logo_uri' => 'bd.jpg',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'England',
                'logo_uri' => 'en.jpg',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'India',
                'logo_uri' => 'in.jpg',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'New Zealand',
                'logo_uri' => 'nz.jpg',
            ),

            6 =>
            array (
                'id' => 7,
                'name' => 'Pakistan',
                'logo_uri' => 'pk.jpg',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'South Africa',
                'logo_uri' => 'sa.jpg',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Sri Lanka',
                'logo_uri' => 'sl.jpg',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'West Indies',
                'logo_uri' => 'wi.jpg',
            ),


        ));

    }
}
