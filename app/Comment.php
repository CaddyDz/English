<?php

namespace English;

use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableContract;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model implements ReactableContract
{
    use Reactable;
    use HasFactory;

    protected $appends = ['ownerName', 'longAgo'];

    protected $fillable = ['user_id', 'status_id', 'body'];

    public function getOwnerNameAttribute(): string
    {
        return $this->owner->username;
    }

    public function getLongAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
