<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('levels')->delete();
        
        \DB::table('levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Icu',
                'best' => '2500000',
                'created_at' => '2020-12-11 13:56:27',
                'updated_at' => '2020-12-11 13:57:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Isolasi',
                'best' => '2000000',
                'created_at' => '2020-12-11 13:57:05',
                'updated_at' => '2020-12-11 13:57:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kelas 1',
                'best' => '1500000',
                'created_at' => '2020-12-11 13:57:53',
                'updated_at' => '2020-12-11 13:57:53',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Kelas 2',
                'best' => '1000000',
                'created_at' => '2020-12-11 13:58:19',
                'updated_at' => '2020-12-11 13:58:19',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Kelas 3',
                'best' => '500000',
                'created_at' => '2020-12-11 13:58:43',
                'updated_at' => '2020-12-11 13:58:43',
            ),
        ));
        
        
    }
}