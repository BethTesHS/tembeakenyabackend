<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupJoinRequest extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
    ];

    /**
     * Get the group that the request is for.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get the user that made the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
