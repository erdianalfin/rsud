<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = rajaongkir('https://pro.rajaongkir.com/api/city', 'get');

		foreach ($city['results'] as $city) {
			City::create([
				'city_id' => $city['city_id'],
				'type' => $city['type'],
				'name' => $city['city_name'],
				'postal_code' => $city['postal_code'],
				'province_id' => $city['province_id']
			]);
		}
    }
}
