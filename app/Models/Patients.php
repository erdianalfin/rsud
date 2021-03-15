<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = ['nik', 'no_rm', 'name', 'province_id', 'city_id', 'date_of_birth', 'gender', 'address', 'phone'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function handler()
    {
        return $this->belongsTo(Handler::class);
    }
}
