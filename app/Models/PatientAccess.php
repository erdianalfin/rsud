<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAccess extends Model
{
    protected $fillable = ['patient_id', 'user_id', 'no_rm'];

    
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

}
