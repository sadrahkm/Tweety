<?php
/**
 * Created by PhpStorm.
 * User: sadra
 * Date: 9/11/20
 * Time: 2:02 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

trait Followable
{

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_id');
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if ($this->isFollowing($user)) {
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }

    public function isFollowing(User $user)
    {
        return auth()->user()->follows()->where('following_id', $user->id)->exists();
    }

    public function followers()
    {
        $followers = DB::table('follows')->select('user_id')->where('following_id',$this->id);
        return User::whereIn('id',$followers)->get();
    }

}
