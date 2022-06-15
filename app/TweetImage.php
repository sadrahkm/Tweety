<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetImage extends Model
{
    protected $fillable = ['path'];
    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public function getPathAttribute($value)
    {
        if ($value)
            return asset("storage/" . $value);
        return $value;
    }
}
