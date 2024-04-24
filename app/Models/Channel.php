<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'channel_icon_url',
        'is_public',
        'creator_id',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(ChannelMember::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
