<?php

use Illuminate\Database\Seeder;

class BookingSchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('booking_schedules')->delete();
        
        \DB::table('booking_schedules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'no_reservation' => '959426',
                'schedule_id' => 1,
                'patient_id' => 7,
                'booking_date' => '1607436351',
                'booking_date_expires' => '1607781951',
                'user_id' => 3,
                'status' => 'waiting',
                'poliklinik_id' => 12,
                'created_at' => '2020-12-08 21:05:51',
                'updated_at' => '2020-12-08 21:05:51',
            ),
            1 => 
            array (
                'id' => 4,
                'no_reservation' => '603054',
                'schedule_id' => 4,
                'patient_id' => 6,
                'booking_date' => '1607498836',
                'booking_date_expires' => '1607844436',
                'user_id' => 1,
                'status' => 'waiting',
                'poliklinik_id' => 8,
                'created_at' => '2020-12-09 14:27:16',
                'updated_at' => '2020-12-09 14:27:16',
            ),
        ));
        
        
    }
}