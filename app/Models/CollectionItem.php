<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'model_type',
        'model_id',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function model()
    {
        return $this->morphTo();
    }
}
