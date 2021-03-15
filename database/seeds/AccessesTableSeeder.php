<?php

use Illuminate\Database\Seeder;

class AccessesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('accesses')->delete();
        
        \DB::table('accesses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Igd',
                'created_at' => '2020-12-06 08:11:09',
                'updated_at' => '2020-12-06 08:11:09',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rujukan Internal',
                'created_at' => '2020-12-06 08:11:09',
                'updated_at' => '2020-12-06 08:11:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rujukan External',
                'created_at' => '2020-12-06 08:11:46',
                'updated_at' => '2020-12-06 08:11:46',
            ),
        ));
        
        
    }
}