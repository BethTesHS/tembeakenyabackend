<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'group_hike_id', 'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groupHike()
    {
        return $this->belongsTo(GroupHike::class);
    }
}
