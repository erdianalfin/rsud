<?php

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = rajaongkir('https://pro.rajaongkir.com/api/province', 'get');

		foreach($province['results'] as $province)
		{
			Province::create([
				'province_id' => $province['province_id'],
				'name' => $province['province']
			]);
		}

    }
}
