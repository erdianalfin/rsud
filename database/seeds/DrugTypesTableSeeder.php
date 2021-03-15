<?php

use Illuminate\Database\Seeder;

class DrugTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('drug_types')->delete();
        
        \DB::table('drug_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tablet',
                'created_at' => '2020-12-10 15:50:08',
                'updated_at' => '2020-12-10 15:50:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kapsul',
                'created_at' => '2020-12-10 15:50:21',
                'updated_at' => '2020-12-10 15:50:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'pill',
                'created_at' => '2020-12-10 15:50:35',
                'updated_at' => '2020-12-10 15:50:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sirup',
                'created_at' => '2020-12-10 15:50:55',
                'updated_at' => '2020-12-10 15:50:55',
            ),
        ));
        
        
    }
}