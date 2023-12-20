<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pac extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'longitude',
        'latitude',
        'notes',
        'incident_id',
    ];

    public function mitigation_measures()
    {
        return $this->belongsToMany(MitigationMeasure::class, 'mitigation_measures_pac');
    }

    public function control_measures()
    {
        return $this->belongsToMany(ControlMeasure::class, 'control_measures_pac');

    }

    public function incident()
    {
        return $this->belongsTo(Incident::class);

    }
}
