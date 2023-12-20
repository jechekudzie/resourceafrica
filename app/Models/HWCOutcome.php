<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class HWCOutcome extends Model
{

    use HasFactory, HasSlug;

    protected $guarded = [];

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

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function type()
    {
        return $this->belongsTo(HWCType::class, 'h_w_c_type_id');
    }
}
