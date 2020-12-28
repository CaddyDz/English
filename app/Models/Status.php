<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = 'statuses';

    public $primaryKey = 'id';

    public $timestamps = true;

    public $fillable = [
        'body',
        'image',
    ];

    public static $rules = [
        'body'  => 'required|max:1000',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
