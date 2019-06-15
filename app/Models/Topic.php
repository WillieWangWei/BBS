<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = [
        'slug',
        'body',
        'title',
        'order',
        'user_id',
        'excerpt',
        'view_count',
        'category_id',
        'reply_count',
        'last_reply_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
