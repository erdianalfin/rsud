<?php

use Illuminate\Database\Seeder;

class PatientAccessesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patient_accesses')->delete();
        
        \DB::table('patient_accesses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'patient_id' => 5,
                'user_id' => 3,
                'no_rm' => 'RM_772452',
                'created_at' => '2020-12-07 17:06:54',
                'updated_at' => '2020-12-07 17:06:54',
            ),
            1 => 
            array (
                'id' => 8,
                'patient_id' => 7,
                'user_id' => 3,
                'no_rm' => 'RM_835714',
                'created_at' => '2020-12-07 20:05:11',
                'updated_at' => '2020-12-07 20:05:11',
            ),
        ));
        
        
    }
}