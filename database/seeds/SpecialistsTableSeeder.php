<?php

use Illuminate\Database\Seeder;

class SpecialistsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('specialists')->delete();
        
        \DB::table('specialists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Spesialis Gigi',
                'created_at' => '2020-12-07 09:11:27',
                'updated_at' => '2020-12-07 09:11:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Spesialis Tht',
                'created_at' => '2020-12-07 09:11:44',
                'updated_at' => '2020-12-07 09:11:44',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Spesialis Paru',
                'created_at' => '2020-12-07 09:11:59',
                'updated_at' => '2020-12-07 09:11:59',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Spesialis Mata',
                'created_at' => '2020-12-07 09:12:17',
                'updated_at' => '2020-12-07 09:12:17',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Spesialis Penyakit Dalam',
                'created_at' => '2020-12-07 09:12:32',
                'updated_at' => '2020-12-07 09:12:32',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Spesialis Jantung',
                'created_at' => '2020-12-07 09:12:48',
                'updated_at' => '2020-12-07 09:12:48',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Spesialis Anak',
                'created_at' => '2020-12-07 09:13:06',
                'updated_at' => '2020-12-07 09:13:06',
            ),
        ));
        
        
    }
}