<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //\DB::table('players')->delete();

        \DB::table('players')->insert(array (

            // Australia

            0 =>
            array (
                'id' => 1,
                'team_id' => 2,
                'first_name' => 'Aaron',
                'last_name' => 'Finch',
                'image_uri' => 'finch.jpg',
                'jersey_num' => '45',
                'country_code' => 'AU',
            ),
            1 =>
            array (
                'id' => 2,
                'team_id' => 2,
                'first_name' => 'David',
                'last_name' => 'Warner',
                'image_uri' => 'warner.jpg',
                'jersey_num' => '32',
                'country_code' => 'AU',
            ),
            2 =>
            array (
                'id' => 3,
                'team_id' => 2,
                'first_name' => 'Steve',
                'last_name' => 'Smith',
                'image_uri' => 'smith.jpg',
                'jersey_num' => '10',
                'country_code' => 'AU',
            ),
            3 =>
            array (
                'id' => 4,
                'team_id' => 2,
                'first_name' => 'Glenn',
                'last_name' => 'Maxwell',
                'image_uri' => 'maxwell.jpg',
                'jersey_num' => '25',
                'country_code' => 'AU',
            ),
            4 =>
            array (
                'id' => 5,
                'team_id' => 2,
                'first_name' => 'Adam',
                'last_name' => 'Zampa',
                'image_uri' => 'zampa.jpg',
                'jersey_num' => '2',
                'country_code' => 'AU',
            ),
            5 =>
            array (
                'id' => 6,
                'team_id' => 2,
                'first_name' => 'Usman',
                'last_name' => 'Khawja',
                'image_uri' => 'usman.jpg',
                'jersey_num' => '18',
                'country_code' => 'AU',
            ),

            6 =>
            array (
                'id' => 7,
                'team_id' => 2,
                'first_name' => 'Pat',
                'last_name' => 'Cummins',
                'image_uri' => 'cummins.jpg',
                'jersey_num' => '22',
                'country_code' => 'AU',
            ),
            7 =>
            array (
                'id' => 8,
                'team_id' => 2,
                'first_name' => 'Alex',
                'last_name' => 'Carey',
                'image_uri' => 'carey.jpg',
                'jersey_num' => '11',
                'country_code' => 'AU',
            ),
            8 =>
            array (
                'id' => 9,
                'team_id' => 2,
                'first_name' => 'Mitchell',
                'last_name' => 'Starc',
                'image_uri' => 'starc.jpg',
                'jersey_num' => '40',
                'country_code' => 'AU',
            ),
            9 =>
            array (
                'id' => 10,
                'team_id' => 2,
                'first_name' => 'Nathan',
                'last_name' => 'Coulter-Nile',
                'image_uri' => 'nathan.jpg',
                'jersey_num' => '32',
                'country_code' => 'AU',
            ),

            10 =>
            array (
                'id' => 11,
                'team_id' => 2,
                'first_name' => 'Kane',
                'last_name' => 'Richardson',
                'image_uri' => 'kane.jpg',
                'jersey_num' => '19',
                'country_code' => 'AU',
            ),

            // England
                11 =>
                array (
                    'id' => 12,
                    'team_id' => 4,
                    'first_name' => 'Jason',
                    'last_name' => 'Roy',
                    'image_uri' => 'jason.jpg',
                    'jersey_num' => '5',
                    'country_code' => 'EN',
                ),
                12 =>
                array (
                    'id' => 13,
                    'team_id' => 4,
                    'first_name' => 'Jonny',
                    'last_name' => 'Bairstow',
                    'image_uri' => 'jonny.jpg',
                    'jersey_num' => '2',
                    'country_code' => 'EN',
                ),
                13 =>
                array (
                    'id' => 14,
                    'team_id' => 4,
                    'first_name' => 'Joe',
                    'last_name' => 'Root',
                    'image_uri' => 'root.jpg',
                    'jersey_num' => '10',
                    'country_code' => 'EN',
                ),
                14 =>
                array (
                    'id' => 15,
                    'team_id' => 4,
                    'first_name' => 'Eoin',
                    'last_name' => 'Morgan',
                    'image_uri' => 'morgan.jpg',
                    'jersey_num' => '25',
                    'country_code' => 'EN',
                ),
                15 =>
                array (
                    'id' => 16,
                    'team_id' => 4,
                    'first_name' => 'Ben',
                    'last_name' => 'Stokes',
                    'image_uri' => 'ben.jpg',
                    'jersey_num' => '2',
                    'country_code' => 'EN',
                ),
                16 =>
                array (
                    'id' => 17,
                    'team_id' => 4,
                    'first_name' => 'Jos',
                    'last_name' => 'Butler',
                    'image_uri' => 'butler.jpg',
                    'jersey_num' => '18',
                    'country_code' => 'EN',
                ),

                17 =>
                array (
                    'id' => 18,
                    'team_id' => 4,
                    'first_name' => 'Adil',
                    'last_name' => 'Rashid',
                    'image_uri' => 'adil.jpg',
                    'jersey_num' => '22',
                    'country_code' => 'EN',
                ),
                18 =>
                array (
                    'id' => 19,
                    'team_id' => 4,
                    'first_name' => 'Moeen',
                    'last_name' => 'Ali',
                    'image_uri' => 'moeen.jpg',
                    'jersey_num' => '9',
                    'country_code' => 'EN',
                ),
                19 =>
                array (
                    'id' => 20,
                    'team_id' => 4,
                    'first_name' => 'Chris',
                    'last_name' => 'Woaks',
                    'image_uri' => 'woaks.jpg',
                    'jersey_num' => '57',
                    'country_code' => 'EN',
                ),
                20 =>
                array (
                    'id' => 21,
                    'team_id' => 4,
                    'first_name' => 'Liam',
                    'last_name' => 'Plunkett',
                    'image_uri' => 'plunkett.jpg',
                    'jersey_num' => '21',
                    'country_code' => 'EN',
                ),

                21 =>
                array (
                    'id' => 22,
                    'team_id' => 4,
                    'first_name' => 'Jofra',
                    'last_name' => 'Archer',
                    'image_uri' => 'archer.jpg',
                    'jersey_num' => '39',
                    'country_code' => 'EN',
                ),


            // India
                22 =>
                array (
                    'id' => 23,
                    'team_id' => 5,
                    'first_name' => 'Shikhar',
                    'last_name' => 'Dhawan',
                    'image_uri' => 'dhawan.jpg',
                    'jersey_num' => '51',
                    'country_code' => 'IN',
                ),
                23 =>
                array (
                    'id' => 24,
                    'team_id' => 5,
                    'first_name' => 'Rohit',
                    'last_name' => 'Sharma',
                    'image_uri' => 'rohit.jpg',
                    'jersey_num' => '32',
                    'country_code' => 'IN',
                ),
                24 =>
                array (
                    'id' => 25,
                    'team_id' => 5,
                    'first_name' => 'Virat',
                    'last_name' => 'Kohli',
                    'image_uri' => 'virat.jpg',
                    'jersey_num' => '10',
                    'country_code' => 'IN',
                ),
                25 =>
                array (
                    'id' => 26,
                    'team_id' => 5,
                    'first_name' => 'K.L',
                    'last_name' => 'Rahul',
                    'image_uri' => 'rahul.jpg',
                    'jersey_num' => '28',
                    'country_code' => 'IN',
                ),
                26 =>
                array (
                    'id' => 27,
                    'team_id' => 5,
                    'first_name' => 'M.S.',
                    'last_name' => 'Dhoni',
                    'image_uri' => 'dhoni.jpg',
                    'jersey_num' => '11',
                    'country_code' => 'IN',
                ),
                27 =>
                array (
                    'id' => 28,
                    'team_id' => 5,
                    'first_name' => 'Hardik',
                    'last_name' => 'Pandya',
                    'image_uri' => 'pandya.jpg',
                    'jersey_num' => '3',
                    'country_code' => 'IN',
                ),

                28 =>
                array (
                    'id' => 29,
                    'team_id' => 5,
                    'first_name' => 'Yuzvendra',
                    'last_name' => 'Chahal',
                    'image_uri' => 'chahal.jpg',
                    'jersey_num' => '46',
                    'country_code' => 'IN',
                ),
                29 =>
                array (
                    'id' => 30,
                    'team_id' => 5,
                    'first_name' => 'Mohd',
                    'last_name' => 'Shami',
                    'image_uri' => 'shami.jpg',
                    'jersey_num' => '7',
                    'country_code' => 'IN',
                ),
                30 =>
                array (
                    'id' => 31,
                    'team_id' => 5,
                    'first_name' => 'Kedar',
                    'last_name' => 'Jadav',
                    'image_uri' => 'kedar.jpg',
                    'jersey_num' => '78',
                    'country_code' => 'IN',
                ),
                31 =>
                array (
                    'id' => 32,
                    'team_id' => 5,
                    'first_name' => 'Kuldeep',
                    'last_name' => 'Yadav',
                    'image_uri' => 'kuldeep.jpg',
                    'jersey_num' => '30',
                    'country_code' => 'IN',
                ),

                32 =>
                array (
                    'id' => 33,
                    'team_id' => 5,
                    'first_name' => 'Jasprit',
                    'last_name' => 'Bumrah',
                    'image_uri' => 'bumrah.jpg',
                    'jersey_num' => '44',
                    'country_code' => 'IN',
                ),

            33 =>
            array (
                'id' => 34,
                'team_id' => 8,
                'first_name' => 'Quinton',
                'last_name' => 'De-Cock',
                'image_uri' => 'cock.jpg',
                'jersey_num' => '23',
                'country_code' => 'SA',
            ),
            34 =>
            array (
                'id' => 35,
                'team_id' => 8,
                'first_name' => 'Hashim',
                'last_name' => 'Amla',
                'image_uri' => 'amla.jpg',
                'jersey_num' => '99',
                'country_code' => 'SA',
            ),
            35 =>
            array (
                'id' => 36,
                'team_id' => 8,
                'first_name' => 'Aiden',
                'last_name' => 'Markram',
                'image_uri' => 'markram.jpg',
                'jersey_num' => '25',
                'country_code' => 'SA',
            ),
            36 =>
            array (
                'id' => 37,
                'team_id' => 8,
                'first_name' => 'JP',
                'last_name' => 'Duminy',
                'image_uri' => 'duminy.jpg',
                'jersey_num' => '61',
                'country_code' => 'SA',
            ),
            37 =>
            array (
                'id' => 38,
                'team_id' => 8,
                'first_name' => 'Rassie van der',
                'last_name' => 'Dussen',
                'image_uri' => 'dussen.jpg',
                'jersey_num' => '27',
                'country_code' => 'SA',
            ),
            38 =>
            array (
                'id' => 39,
                'team_id' => 8,
                'first_name' => 'Faf',
                'last_name' => 'du Plessis',
                'image_uri' => 'faf.jpg',
                'jersey_num' => '22',
                'country_code' => 'SA',
            ),

            39 =>
            array (
                'id' => 40,
                'team_id' => 8,
                'first_name' => 'Dwine',
                'last_name' => 'Pretorious',
                'image_uri' => 'dwine.jpg',
                'jersey_num' => '9',
                'country_code' => 'SA',
            ),
            40 =>
            array (
                'id' => 41,
                'team_id' => 8,
                'first_name' => 'Andile',
                'last_name' => 'Phehlukawyo',
                'image_uri' => 'andile.jpg',
                'jersey_num' => '37',
                'country_code' => 'SA',
            ),
            41 =>
            array (
                'id' => 42,
                'team_id' => 8,
                'first_name' => 'Kagiso',
                'last_name' => 'Rabada',
                'image_uri' => 'rabada.jpg',
                'jersey_num' => '50',
                'country_code' => 'SA',
            ),
            42 =>
            array (
                'id' => 43,
                'team_id' => 8,
                'first_name' => 'Lungi',
                'last_name' => 'Ngidi',
                'image_uri' => 'ngidi.jpg',
                'jersey_num' => '78',
                'country_code' => 'SA',
            ),

            43 =>
            array (
                'id' => 44,
                'team_id' => 8,
                'first_name' => 'Imran',
                'last_name' => 'Tahir',
                'image_uri' => 'tahir.jpg',
                'jersey_num' => '10',
                'country_code' => 'SA',
            ),

            44 =>
            array (
                'id' => 45,
                'team_id' => 8,
                'first_name' => 'David',
                'last_name' => 'Miller',
                'image_uri' => 'david.jpg',
                'jersey_num' => '75',
                'country_code' => 'SA',
            ),


        ));

    }
}
