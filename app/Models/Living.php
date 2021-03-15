<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Living extends Model
{
    protected $fillable = ['name', 'amount_bed', 'level_id', 'building_id'];

    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
