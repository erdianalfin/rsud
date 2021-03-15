<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthCheckup extends Model
{
    protected $fillable = ['complaints', 'action', 'medical_measures', 'booking_schedule_id', 'date'];

    public function bookingSchedule()
    {
        return $this->belongsTo(BookingSchedule::class);
    }
}
