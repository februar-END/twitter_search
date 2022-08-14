<?php
namespace App\Http\Api;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class callTwitterApi
{
    private $connection;
    public function __construct(){
        $this->connection = new TwitterOAuth(
            env('TWITTER_CLIENT_KEY'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));
    }

    public function searchTweets(String $searchWord)
    {
        $searchResults = $this->connection->get("search/tweets",[
            'q' => $searchWord,
            'count' => 100,
        ]);
        //dd($searchResults);
        return $searchResults->statuses;
    }

    //public function statusesOembed(String $id)
    //{
        //$searchResults = $this->connection->get("statuses/oembed",[
            //'id' => $id,
       // ]);
        //dd($searchResults);
        //return $searchResults->html;
    //}
}