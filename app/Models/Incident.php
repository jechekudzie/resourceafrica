<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'longitude',
        'latitude',
        'date',
        'time',
        'image',
        'user_id',
        'organization_id',
        'h_w_c_outcome_id',
    ];

    //updates
    public function updates()
    {
        return $this->hasMany(Update::class);
    }

    //species
    public function species()
    {
        return $this->belongsToMany(Species::class, 'incident_species');
    }

    function outcome()
    {
        return $this->belongsTo(HWCOutcome::class, 'h_w_c_outcome_id');
    }
}
