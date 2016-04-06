<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Twitter;
use DB;
use App\Http\Controllers\Controller;

class TweetsController extends Controller {
    function viewTweets(Request $request) {
        $userid = $request['userid'];
	    $rows = DB::table('users')->where('id',$userid)->first();
	    $tweetid = $rows->tweet;
	    $tweet = Twitter::getUserTimeline(['screen_name' => $tweetid, 
		'count' => 20, 'format' => 'json']);

		return $tweet;
	}     
}
