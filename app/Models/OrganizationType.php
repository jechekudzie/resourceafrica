<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class OrganizationType extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name'];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'field_organization_types', 'organization_type_id', 'field_id');
    }

    public function children()
    {
        return $this->belongsToMany(OrganizationType::class, 'organization_type_organization_type', 'organization_type_id', 'child_id')->withPivot('notes');
    }

    public function parents()
    {
        return $this->belongsToMany(OrganizationType::class, 'organization_type_organization_type', 'child_id', 'organization_type_id')->withPivot('notes');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
