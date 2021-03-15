<?php

use Illuminate\Database\Seeder;

class DrugsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('drugs')->delete();
        
        \DB::table('drugs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Paramex',
                'price' => 1000,
                'drug_type_id' => 1,
                'stok' => '500',
                'created_at' => '2020-12-10 15:51:26',
                'updated_at' => '2020-12-10 15:51:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bodrex',
                'price' => 1000,
                'drug_type_id' => 1,
                'stok' => '500',
                'created_at' => '2020-12-10 15:51:53',
                'updated_at' => '2020-12-10 15:51:53',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Oskadon',
                'price' => 1000,
                'drug_type_id' => 1,
                'stok' => '500',
                'created_at' => '2020-12-10 15:52:12',
                'updated_at' => '2020-12-10 15:52:12',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Oskadon xp',
                'price' => 1000,
                'drug_type_id' => 3,
                'stok' => '1000',
                'created_at' => '2020-12-10 15:52:46',
                'updated_at' => '2020-12-10 15:52:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Super tetra',
                'price' => 2500,
                'drug_type_id' => 2,
                'stok' => '2500',
                'created_at' => '2020-12-10 15:53:23',
                'updated_at' => '2020-12-10 15:53:23',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Konidin',
                'price' => 1000,
                'drug_type_id' => 1,
                'stok' => '1000',
                'created_at' => '2020-12-10 15:53:55',
                'updated_at' => '2020-12-10 15:53:55',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Konidin cair',
                'price' => 2000,
                'drug_type_id' => 4,
                'stok' => '500',
                'created_at' => '2020-12-10 15:54:27',
                'updated_at' => '2020-12-10 15:54:27',
            ),
        ));
        
        
    }
}