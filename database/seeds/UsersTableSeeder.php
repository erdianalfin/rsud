<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'image' => NULL,
                'status' => 'active',
                'role_id' => 1,
                'created_at' => '2020-10-20 19:47:58',
                'updated_at' => '2020-10-20 19:47:58',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'apoteker',
                'email' => 'apoteker@gmail.com',
                'password' => bcrypt('apoteker'),
                'image' => NULL,
                'status' => 'active',
                'role_id' => 4,
                'created_at' => '2020-10-20 19:47:58',
                'updated_at' => '2020-10-20 19:47:58',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'Patient',
                'email' => 'patient@gmail.com',
                'password' => bcrypt('patient'),
                'image' => NULL,
                'status' => 'active',
                'role_id' => 2,
                'created_at' => '2020-10-20 19:47:58',
                'updated_at' => '2020-10-20 19:47:58',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'Doctor',
                'email' => 'doctor@gmail.com',
                'password' => bcrypt('doctor'),
                'image' => NULL,
                'status' => 'active',
                'role_id' => 3,
                'created_at' => '2020-10-20 19:47:58',
                'updated_at' => '2020-10-20 19:47:58',
            ),
        ));
        
        
    }
}