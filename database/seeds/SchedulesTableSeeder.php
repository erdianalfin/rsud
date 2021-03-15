<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('schedules')->delete();
        
        \DB::table('schedules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 1,
                'day_id' => '1',
                'start_hours' => '10:00',
                'hours_completed' => '12:00',
                'poliklinik_id' => 12,
                'price' => 50000,
                'created_at' => '2020-12-07 09:24:10',
                'updated_at' => '2020-12-07 09:24:10',
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 1,
                'day_id' => '3',
                'start_hours' => '15:00',
                'hours_completed' => '18:00',
                'poliklinik_id' => 12,
                'price' => 50000,
                'created_at' => '2020-12-07 09:24:46',
                'updated_at' => '2020-12-07 09:30:38',
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 2,
                'day_id' => '3',
                'start_hours' => '13:00',
                'hours_completed' => '15:00',
                'poliklinik_id' => 7,
                'price' => 50000,
                'created_at' => '2020-12-07 09:25:21',
                'updated_at' => '2020-12-07 09:25:21',
            ),
            3 => 
            array (
                'id' => 4,
                'doctor_id' => 3,
                'day_id' => '4',
                'start_hours' => '15:00',
                'hours_completed' => '17:00',
                'poliklinik_id' => 8,
                'price' => 50000,
                'created_at' => '2020-12-07 09:27:42',
                'updated_at' => '2020-12-07 09:27:42',
            ),
        ));
        
        
    }
}