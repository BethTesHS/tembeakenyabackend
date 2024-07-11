<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'description',
        'image',
    ];

    /**
     * returns the related hike
     */
    public function hike()
    {
        return $this->belongsTo(Hike::class);
    }
}
