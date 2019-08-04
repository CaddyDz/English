<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $appends = ['ownerName', 'longAgo'];

    protected $fillable = ['user_id', 'status_id', 'body'];

    public function getOwnerNameAttribute()
    {
        return $this->owner->username;
    }

    public function getLongAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
