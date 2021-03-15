<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    protected $fillable = ['no_reservation', 'schedule_id', 'patient_id', 'booking_date', 'booking_date_expires', 'user_id', 'status', 'poliklinik_id'];

    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }
    
    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
}
