<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
		'province_id', 'name'
	];

	public function city()
	{
		return $this->hasOne(City::class);
	}
}
