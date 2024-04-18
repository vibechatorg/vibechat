<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelMember extends Model
{
    protected $fillable = [
        'channel_id',
        'user_id',
        'role',
        'joined_at',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
