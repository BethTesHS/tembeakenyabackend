<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupHikeAttendee extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_hike_id', 'user_id', 'name', 'phone_number', 'email', 'emergency_contact'
    ];

    public function groupHike()
    {
        return $this->belongsTo(GroupHike::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
