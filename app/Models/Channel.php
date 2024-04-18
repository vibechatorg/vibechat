<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'channel_icon_url',
        'is_public',
        'creator_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function members()
    {
        return $this->hasMany(ChannelMember::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
