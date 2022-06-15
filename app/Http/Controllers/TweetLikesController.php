<?php
/*
namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $likeModel = $tweet->like();
        if($likeModel)
            return response()->json([
                'status' => true,
                'message' => 'Well Done !',
                'increment' => true
            ]);
        return response()->json([
            'status' => false,
            'message' => 'There was a error while liking this tweet'
        ]);
    }

    public function destroy(Tweet $tweet)
    {
        $likeModel = $tweet->dislike();
        if($likeModel)
            return response()->json([
                'status' => true,
                'message' => 'Well Done !'
            ]);
        return response()->json([
            'status' => false,
            'message' => 'There was a error while liking this tweet'
        ]);
    }
}*/
namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $likeModel = $tweet->like();
        if($likeModel)
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Well Done !'
            ]);
        return back()->with([
            'status' => 'error',
            'message' => 'There was a error while liking this tweet'
        ]);
    }

    public function destroy(Tweet $tweet)
    {
        $likeModel = $tweet->dislike();
        if($likeModel)
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Well Done !'
            ]);
        return back()->with([
            'status' => 'error',
            'message' => 'There was a error while liking this tweet'
        ]);
    }
}
