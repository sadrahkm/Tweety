<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Likable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(TweetImage::class);
    }

    public function getPathAttribute($value)
    {
        if ($value)
            return asset("storage/" . $value);
        return $value;
    }


}
