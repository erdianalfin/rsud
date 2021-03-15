<?php

use Illuminate\Database\Seeder;

class UserTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_tokens')->delete();
        
        \DB::table('user_tokens')->insert(array (
            0 => 
            array (
                'id' => 1,
                'verify' => NULL,
                'reset' => NULL,
                'expired' => NULL,
                'user_id' => 1,
                'created_at' => '2020-10-20 20:12:48',
                'updated_at' => '2020-10-20 20:12:48',
            ),
            1 => 
            array (
                'id' => 2,
                'verify' => NULL,
                'reset' => NULL,
                'expired' => NULL,
                'user_id' => 2,
                'created_at' => '2020-10-20 20:12:48',
                'updated_at' => '2020-10-20 20:12:48',
            ),
            2 => 
            array (
                'id' => 3,
                'verify' => NULL,
                'reset' => NULL,
                'expired' => NULL,
                'user_id' => 3,
                'created_at' => '2020-10-20 20:12:48',
                'updated_at' => '2020-10-20 20:12:48',
            ),
            3 => 
            array (
                'id' => 4,
                'verify' => NULL,
                'reset' => NULL,
                'expired' => NULL,
                'user_id' => 4,
                'created_at' => '2020-10-20 20:12:48',
                'updated_at' => '2020-10-20 20:12:48',
            ),
        ));
        
        
    }
}