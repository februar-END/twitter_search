<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\CallTwitterApi;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        $connection = new callTwitterApi();
        $keyword = $request->input('searchWord');
        $id = $request->user()->id;
        if(!empty($keyword)){
            $searchResults = $connection->searchTweets($keyword);
        }
        else {
            $searchResults = $connection->searchTweets("テスト");
        }
        return view('twitter', ['twitter' => $searchResults])->with('id', $id);
    }

    public function save(Request $requests)
    {
        $tweets = $requests->all()['check'];
        foreach($tweets as $number => $value) {
            $tweet = new Tweet;
            $tweet->user_id = $requests->user()->id;
            $tweet->content = $value;
            $tweet->save();
        }
        return redirect()->route('tweet.index')->with('feedback.success',"保存に成功しました");
    }

    public function keep(Request $request)
    {
        $tweets = Tweet::where('user_id', '=', $request->route('id'))->get();
        $id = $request->user()->id;
        if($request->route('id') != $id)
        {
            throw new AccessDeniedHttpException();
        }
        return view('keep', ['id' => $id])->with('tweets',$tweets);
    }

    public function delete(Request $requests)
    {
        $tweets = $requests->all()['check'];
        $id = $requests->user()->id;
        if($requests->route('id') != $id)
        {
            throw new AccessDeniedHttpException();
        }
        foreach($tweets as $number => $id) {
            $tweetData = Tweet::where('id',$id)->firstOrFail();
            $tweetData->delete();
        }
        return redirect()->route('tweet.keep', ['id' => $requests->user()->id])->with('feedback.success',"削除に成功しました");
    }
}