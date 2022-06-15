<?php

namespace App\Http\Controllers;

use App\Followable;
use App\Notifications\FriendTweet;
use App\Tweet;
use App\TweetImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('home', compact('tweets'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $attrs = $this->validate(request(), [
            'body' => 'required|max:255',
            'images' => 'nullable'
        ]);
        $tweet = Tweet::create([
            'user_id' => $user->id,
            'body' => $attrs['body']
        ]);
        if (!empty($images = $request->file('images'))) {
            foreach ($images as $image) {
                $imagePath = $image->store('tweet_images');
                $tweet->images()->create(['path' => $imagePath]);
            }
        }
        $userFollowers = $user->followers();
//        $user->notify(new FriendTweet($user));
        Notification::send($userFollowers, new FriendTweet($user));
        return redirect()->route('home');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        foreach ($tweet->images as $image) {
            Storage::delete($image->path);
        }
        return back();
    }
}
