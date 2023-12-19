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
        'location',
        'date',
        'time',
        'image',
        'user_id',
        'organization_id',
        'species_id',
        'status_id',
    ];

    //updates
    public function updates()
    {
        return $this->hasMany(Update::class);
    }
}
