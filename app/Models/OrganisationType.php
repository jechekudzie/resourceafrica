<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class OrganisationType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }
}
