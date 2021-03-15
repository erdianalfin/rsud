<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patients')->delete();
        
        \DB::table('patients')->insert(array (
            0 => 
            array (
                'id' => 5,
                'no_rm' => 'RM_772452',
                'name' => 'Adizain Alhaqqu',
                'province_id' => 9,
                'city_id' => 78,
                'date_of_birth' => '2016-12-05',
                'gender' => 'Laki-laki',
                'address' => 'griya cileungsi 5',
                'phone' => '08123202020',
                'access' => 'personal',
                'handler_id' => 4,
                'created_at' => '2020-12-07 17:06:54',
                'updated_at' => '2020-12-07 17:06:54',
            ),
            1 => 
            array (
                'id' => 6,
                'no_rm' => 'RM_826018',
                'name' => 'Alfin Erdian',
                'province_id' => 9,
                'city_id' => 79,
                'date_of_birth' => '2002-05-31',
                'gender' => 'Laki-laki',
                'address' => 'Griya cileungsi 5',
                'phone' => '089616245180',
                'access' => 'insurances',
                'handler_id' => 5,
                'created_at' => '2020-12-07 18:43:02',
                'updated_at' => '2020-12-07 18:43:02',
            ),
            2 => 
            array (
                'id' => 7,
                'no_rm' => 'RM_835714',
                'name' => 'Nabila aulia',
                'province_id' => 9,
                'city_id' => 78,
                'date_of_birth' => '2001-10-10',
                'gender' => 'Perempuan',
                'address' => 'Cibeureum',
                'phone' => '08912030200',
                'access' => 'insurances',
                'handler_id' => 6,
                'created_at' => '2020-12-07 20:05:11',
                'updated_at' => '2020-12-07 20:05:11',
            ),
        ));
        
        
    }
}