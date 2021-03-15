<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['doctor_id', 'day_id', 'start_hours', 'hours_completed', 'poliklinik_id', 'price'];

    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
    
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
