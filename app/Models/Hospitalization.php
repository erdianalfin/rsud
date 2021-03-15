<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $fillable = ['no_hospitalization', 'health_checkup_id', 'living_id', 'entry_date', 'exit_date'];

    public function healthCheckup()
    {
        return $this->belongsTo(HealthCheckup::class);
    }

    public function living()
    {
        return $this->belongsTo(Living::class);
    }
}
