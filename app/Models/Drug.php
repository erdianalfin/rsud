<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = ['name', 'price', 'drug_type_id', 'stok'];

    
    public function drugType()
    {
        return $this->belongsTo(DrugType::class);
    }
}
