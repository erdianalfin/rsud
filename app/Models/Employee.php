<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'npwp', 'phone', 'position_id', 'departement_id'];

    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
