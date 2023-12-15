<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOrganizationValue extends Model
{
    use HasFactory;

    public function valueable()
    {
        return $this->morphTo();
    }
}
