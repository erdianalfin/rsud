<?php

use Illuminate\Database\Seeder;

class PatientInsurancesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patient_insurances')->delete();
        
        \DB::table('patient_insurances')->insert(array (
            0 => 
            array (
                'id' => 1,
                'patient_id' => 6,
                'guarantee_id' => 2,
                'card_number' => '6543212',
                'created_at' => '2020-12-07 18:43:02',
                'updated_at' => '2020-12-07 18:43:02',
            ),
            1 => 
            array (
                'id' => 2,
                'patient_id' => 7,
                'guarantee_id' => 1,
                'card_number' => '654432321',
                'created_at' => '2020-12-07 20:06:57',
                'updated_at' => '2020-12-07 20:06:57',
            ),
        ));
        
        
    }
}