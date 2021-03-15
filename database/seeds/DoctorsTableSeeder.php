<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctors')->delete();
        
        \DB::table('doctors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dr. Alfin Erdian',
                'license_number' => '10123221',
                'alumni' => 'Bina mandiri multimedia',
                'mobile_phone' => '089616245180',
                'specialist_id' => 5,
                'departement_id' => 1,
                'created_at' => '2020-12-07 09:21:27',
                'updated_at' => '2020-12-07 09:31:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dr. Nabila aulia hidayat',
                'license_number' => '10123222',
                'alumni' => 'Bina mandiri multimedia',
                'mobile_phone' => '08912030200',
                'specialist_id' => 4,
                'departement_id' => 1,
                'created_at' => '2020-12-07 09:21:58',
                'updated_at' => '2020-12-07 09:31:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dr. Antonius lanna gerald',
                'license_number' => '10123223',
                'alumni' => 'Bina mandiri multimedia',
                'mobile_phone' => '08123202010',
                'specialist_id' => 1,
                'departement_id' => 1,
                'created_at' => '2020-12-07 09:23:02',
                'updated_at' => '2020-12-07 09:32:13',
            ),
        ));
        
        
    }
}