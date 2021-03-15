<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorAccess extends Model
{
    protected $fillable = ['license_number', 'doctor_id', 'user_id'];
}
