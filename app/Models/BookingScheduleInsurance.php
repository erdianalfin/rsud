<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingScheduleInsurance extends Model
{
    protected $fillable = ['booking_schedule_id', 'access', 'guarantee_id', 'card_number'];

    
    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }
}
