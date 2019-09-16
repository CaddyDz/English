<?php

namespace English;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableContract;

class Status extends Model implements ReactableContract
{
    use Reactable;

    protected $fillable = ['body', 'user_id'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('comments_count', function ($builder) {
            $builder->withCount('comments');
        });
    }

    public function path()
    {
        return '/'.$this->id;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getOwnerNameAttribute()
    {
        return $this->owner->username;
    }

    public function getCommentsPluralAttribute()
    {
        return Str::plural('comment', $this->comments_count);
    }

    public function addComment($comment)
    {
        $this->comments()->create($comment);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function likes()
    {
        return $this->morphMany(React::class, 'reacted');
    }

    public function like()
    {
        $attributes = ['user_id' => auth()->id(), 'reacted_kind' => 'like'];
        if (!$this->likes()->where($attributes)->exists()) {
            $this->likes()->create($attributes);
        }
    }
}
