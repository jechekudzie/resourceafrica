<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'field_organization_values')
            ->withPivot('value');
    }

    public function organizationTypes()
    {
        return $this->belongsToMany(OrganizationType::class, 'field_organization_types');
    }

    public function fieldType()
    {
        return $this->belongsTo(FieldType::class);
    }
}
