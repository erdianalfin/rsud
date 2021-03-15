<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Handler extends Model
{
    protected $fillable = ['name_handler', 'phone_handler', 'job_handler', 'address_handler', 'family_patient_id', 'hospitalization_id'];

    
    public function familyPatient()
    {
        return $this->belongsTo(FamilyPatient::class);
    }
}
