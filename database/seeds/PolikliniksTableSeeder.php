<?php

use Illuminate\Database\Seeder;

class PolikliniksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('polikliniks')->delete();
        
        \DB::table('polikliniks')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => 'Spesialis Mata',
                'slug' => 'spesialis-mata',
                'image' => 'dR26wrWjFh.png',
                'created_at' => '2020-12-02 16:38:09',
                'updated_at' => '2020-12-03 12:01:17',
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Spesialis Gigi',
                'slug' => 'spesialis-gigi',
                'image' => '7Zn0IXfYVY.png',
                'created_at' => '2020-12-02 16:41:42',
                'updated_at' => '2020-12-03 12:24:46',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'Jantung',
                'slug' => 'jantung',
                'image' => '57292_heart.png',
                'created_at' => '2020-12-03 12:27:29',
                'updated_at' => '2020-12-03 15:35:34',
            ),
            3 => 
            array (
                'id' => 10,
                'name' => 'Spesialis Tht',
                'slug' => 'spesialis-tht',
                'image' => '25728_ear.png',
                'created_at' => '2020-12-03 12:31:59',
                'updated_at' => '2020-12-03 12:31:59',
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'Bedah',
                'slug' => 'bedah',
                'image' => '95315_medical-tools.png',
                'created_at' => '2020-12-03 12:32:29',
                'updated_at' => '2020-12-03 12:32:29',
            ),
            5 => 
            array (
                'id' => 12,
                'name' => 'Penyakit Dalam',
                'slug' => 'penyakit-dalam',
                'image' => '70917_kidneys.png',
                'created_at' => '2020-12-03 12:34:39',
                'updated_at' => '2020-12-03 15:35:53',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'Rehab Medik',
                'slug' => 'rehab-medik',
                'image' => 'jVwXDsOT1g.png',
                'created_at' => '2020-12-03 12:41:24',
                'updated_at' => '2020-12-03 12:42:07',
            ),
            7 => 
            array (
                'id' => 14,
                'name' => 'Hemodialisa',
                'slug' => 'hemodialisa',
                'image' => '75351_transfusion.png',
                'created_at' => '2020-12-03 12:42:46',
                'updated_at' => '2020-12-03 12:42:46',
            ),
            8 => 
            array (
                'id' => 15,
                'name' => 'Spesialis Anak',
                'slug' => 'spesialis-anak',
                'image' => '56859_share.png',
                'created_at' => '2020-12-03 12:58:11',
                'updated_at' => '2020-12-03 12:58:11',
            ),
            9 => 
            array (
                'id' => 16,
                'name' => 'Gizi',
                'slug' => 'gizi',
                'image' => '71979_iconfinder_fried_rice_3377056.png',
                'created_at' => '2020-12-03 13:05:27',
                'updated_at' => '2020-12-03 13:05:27',
            ),
        ));
        
        
    }
}