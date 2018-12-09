<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
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
}
