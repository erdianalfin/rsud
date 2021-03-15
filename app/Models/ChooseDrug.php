<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChooseDrug extends Model
{
    protected $fillable = ['health_checkup_id', 'drug_id', 'price', 'qty_drink_rules', 'qty_dosage_rules', 'amout_day', 'totals', 'status', 'message'];

    
    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}