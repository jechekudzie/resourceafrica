<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HumanWildlifeConflict extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function triggers()
    {
        return $this->hasMany(HWCTrigger::class);
    }

    public function outcomes()
    {
        return $this->hasMany(HWCOutcome::class);
    }


}
