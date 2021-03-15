<?php

use Illuminate\Database\Seeder;

class GuaranteesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('guarantees')->delete();
        
        \DB::table('guarantees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bpjs',
                'created_at' => '2020-12-06 08:09:45',
                'updated_at' => '2020-12-06 08:09:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kis',
                'created_at' => '2020-12-06 08:09:45',
                'updated_at' => '2020-12-06 08:09:45',
            ),
        ));
        
        
    }
}