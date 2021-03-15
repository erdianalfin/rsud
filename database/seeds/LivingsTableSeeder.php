<?php

use Illuminate\Database\Seeder;

class LivingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('livings')->delete();
        
        \DB::table('livings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '001',
                'amount_bed' => '2',
                'level_id' => 1,
                'building_id' => 2,
                'created_at' => '2020-12-11 20:17:24',
                'updated_at' => '2020-12-11 20:17:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '002',
                'amount_bed' => '2',
                'level_id' => 2,
                'building_id' => 2,
                'created_at' => '2020-12-11 20:18:00',
                'updated_at' => '2020-12-11 20:18:23',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '003',
                'amount_bed' => '2',
                'level_id' => 3,
                'building_id' => 3,
                'created_at' => '2020-12-11 20:18:44',
                'updated_at' => '2020-12-11 20:18:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '004',
                'amount_bed' => '3',
                'level_id' => 4,
                'building_id' => 3,
                'created_at' => '2020-12-11 20:19:13',
                'updated_at' => '2020-12-11 20:19:13',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '005',
                'amount_bed' => '4',
                'level_id' => 5,
                'building_id' => 3,
                'created_at' => '2020-12-11 20:20:03',
                'updated_at' => '2020-12-11 20:20:03',
            ),
        ));
        
        
    }
}