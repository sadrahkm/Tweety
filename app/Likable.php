<?php
/**
 * Created by PhpStorm.
 * User: sadra
 * Date: 9/28/20
 * Time: 9:47 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function likes()
    {
        return $this->hasMany(Like::class, 'tweet_id', 'id');
    }

    public function like()
    {
        if ($this->isLiked()) {
            return $this->toggleLike();
        }
        return $this->likes()->updateOrCreate([
            'user_id' => auth()->id(),
        ], [
            'liked' => true
        ]);
    }

    public function dislike()
    {
        if ($this->isDisliked()) {
            return $this->toggleLike();
        }
        return $this->likes()->updateOrCreate([
            'user_id' => auth()->id(),
        ], [
            'liked' => false
        ]);
    }

    public function toggleLike()
    {
        return $this->likes()
            ->where('user_id', auth()->id())
            ->delete();
    }

    public function isLiked()
    {
        return $this->likes()
            ->where('user_id', auth()->id())
            ->where('liked', true)
            ->exists();
    }

    public function isDisliked()
    {
        return $this->likes()
            ->where('user_id', auth()->id())
            ->where('liked', false)
            ->exists();
    }

    public function countLikes()
    {
        return $this->likes()
            ->where('user_id', auth()->id())
            ->where('liked', true)
            ->count();
    }

    public function countDislikes()
    {
        return $this->likes()
            ->where('user_id', auth()->id())
            ->where('liked', false)
            ->count();
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeWithLikes(Builder $query)
    {
        return $query->leftJoinSub(
            'select tweet_id,sum(liked::int) as likes,sum((not liked)::int) as dislikes from likes group by tweet_id',
            'likeTable',
            'tweets.id',
            'likeTable.tweet_id'
        );
    }
}
