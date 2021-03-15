<?php

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buildings')->delete();
        
        \DB::table('buildings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Lantai 1',
                'created_at' => '2020-12-11 20:15:14',
                'updated_at' => '2020-12-11 20:15:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lantai 2',
                'created_at' => '2020-12-11 20:15:29',
                'updated_at' => '2020-12-11 20:15:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Lantai 3',
                'created_at' => '2020-12-11 20:15:46',
                'updated_at' => '2020-12-11 20:15:46',
            ),
        ));
        
        
    }
}