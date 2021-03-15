<?php

use Illuminate\Database\Seeder;

class HandlersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('handlers')->delete();
        
        \DB::table('handlers')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name_handler' => 'Tira rustiani',
                'phone_handler' => '08912030200',
                'job_handler' => 'ibu rumah tangga',
                'address_handler' => 'Griya cileungsi 5',
                'family_patient_id' => 1,
                'created_at' => '2020-12-07 17:06:54',
                'updated_at' => '2020-12-07 17:06:54',
            ),
            1 => 
            array (
                'id' => 5,
                'name_handler' => 'rio adrian',
                'phone_handler' => '08123202020',
                'job_handler' => 'web developer',
                'address_handler' => 'kp. tengah',
                'family_patient_id' => 1,
                'created_at' => '2020-12-07 18:43:02',
                'updated_at' => '2020-12-07 18:43:02',
            ),
            2 => 
            array (
                'id' => 6,
                'name_handler' => 'Rizky ananda',
                'phone_handler' => '08123202020',
                'job_handler' => 'Manager',
                'address_handler' => 'Harves city',
                'family_patient_id' => 1,
                'created_at' => '2020-12-07 20:05:11',
                'updated_at' => '2020-12-07 20:05:11',
            ),
        ));
        
        
    }
}