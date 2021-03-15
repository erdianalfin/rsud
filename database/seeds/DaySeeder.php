<?php

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'name' => 'Senin',
            ],
            [
                'name' => 'Selasa',
            ],
            [
                'name' => 'Rabu',
            ],
            [
                'name' => 'Kamis',
            ],
            [
                'name' => 'Jum`at',
            ],
            [
                'name' => 'Sabtu',
            ],
            [
                'name' => 'Minggu',
            ],
        ];

        foreach ($days as $day) {
            Day::create($day);
        }
    }
}
