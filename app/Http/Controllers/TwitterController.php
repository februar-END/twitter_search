<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\CallTwitterApi;
use App\Models\Tweet;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        $connection = new callTwitterApi();
        $keyword = $request->input('searchWord');
        if(!empty($keyword)){
            //dd($keyword);
            $searchResults = $connection->searchTweets($keyword);
        }
        else {
            $searchResults = $connection->searchTweets("テスト");
        }
        //$array = array();
        //foreach($searchResults as $searchResults){
            //$array[] = array($connection->statusesOembed($searchResults->id));
        //}
        return view('twitter', ['twitter' => $searchResults]);
    }

    public function save(Request $requests)
    {
        $tweets = $requests->all()['check'];
        foreach($tweets as $number => $value) {
            $tweet = new Tweet;
            $tweet->content = $value;
            $tweet->save();
        }
        return redirect()->route('tweet.index')->with('feedback.success',"登録に成功しました");
    }

    public function keep(Request $request)
    {
        $tweets = Tweet::all();
        return view('keep')->with('tweets',$tweets);
    }

    public function delete(Request $requests)
    {
        $tweets = $requests->all()['check'];
        foreach($tweets as $number => $id) {
            $tweetData = Tweet::where('id',$id)->firstOrFail();
            $tweetData->delete();
        }
        return redirect()->route('tweet.keep')->with('feedback.success',"削除に成功しました");
    }
}