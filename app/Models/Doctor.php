<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['nik', 'name', 'license_number', 'alumni', 'mobile_phone', 'specialist_id', 'departement_id'];

    
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
