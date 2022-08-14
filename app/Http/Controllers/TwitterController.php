<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\CallTwitterApi;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        $connection = new callTwitterApi();
        $searchResults = $connection->searchTweets("ナンバーガール");
        //$array = array();
        //foreach($searchResults as $searchResults){
            //$array[] = array($connection->statusesOembed($searchResults->id));
        //}
        return view('twitter', ['twitter' => $searchResults]);
    }
}