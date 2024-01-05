<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Organization extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'organization_type_id',
    ];

    function organisations()
    {
        return $this->hasMany(Organization::class);
    }

    public function organizationType()
    {
        return $this->belongsTo(OrganizationType::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'organization_users')
            ->withPivot('role_id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'organization_id');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'field_organization_values', 'organization_id', 'field_id')->withPivot('value');
    }

    public function humaWildLifeConflicts()
    {
        return $this->hasMany(HumanWildlifeConflict::class);
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
