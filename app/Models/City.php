<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
		'city_id', 'province_id', 'type', 'name', 'postal_code'
	];

	public function province()
	{
		return $this->belongsTo(Province::class);
	}
}
