<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'incident_id',
        'user_id',
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }

}
