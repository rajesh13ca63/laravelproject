<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReviewController extends Controller {
    public function review(Request $request) {
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $post = NULL;

        $roles = DB::table('users')
    	          ->select('role')
                  ->where('id', $id)
    	          ->first();

      	$posts = DB::table('users')
                    ->join('reviews', 'users.id', '=', 'reviews.user_id')
                    ->select('users.name', 'users.image', 'reviews.review_name',
                    'reviews.review_id', 'reviews.parent_id', 'reviews.like')
                    ->orderBy ('reviews.review_id', 'desc') 
		            ->get();
        
        $count = 0;
        $scount = 0;
        foreach ($posts as $post) {

            if ($post->parent_id == 0) {
                $data[$count]['review_id'] = $post->review_id;
                $data[$count]['review_name'] = $post->review_name;
                $data[$count]['name'] = $post->name;
                $data[$count]['image'] = $post->image;
                $data[$count]['like'] = $post->like;

            foreach ($posts as $subpost) {
                if ($post->review_id == $subpost->parent_id) {
                    $data[$count]['subcomments'][$scount] = 
                                                    array(
                                                    'review_name' => $subpost->review_name,
                                                    'name' => $subpost->name,
                                                    'image' => $subpost->image,
                                                    'like'  => $subpost->like
                                                    );
                        $scount++;
                }
            }

            $count++;
           }
        }
      
	    return view('review', array('post' => $data, 
                                    'roles' => $roles 
                                    ));
    }
  
    //This is the method to storesl all comments into the database
  	public function reviewPost(Request $request) {
    		$operation = $request['submit'];
    		$comment = $request['post'];
    		$like = $request->input('like');
        $reviewid = $request['review_id'];
        $reply = $request['subpost'];

  		$user = User::find(Auth::user()->id);
          
        /*Here Checking the condition if user is comment and the insert into the database
          and it will retur back to the review page
          @return review
         */
		if ($operation == 'comment') {
          	DB::table('reviews')
      	       ->insert([
                    'user_id' => $user->id,
                    'review_name' => $comment
      	  	    ]);

      	    return redirect('review');
        }

        /*Here checking the conddition if clicking on Like button
         * @return review
         */
        if ($operation == 'like') {
            $likes = DB::table('reviews')
                       ->where('review_id', $reviewid)
                       ->select('like')
                       ->first();

            DB::table('reviews')
               ->where('review_id', $reviewid)
               ->update([
                         'like'=> $likes->like+1 ]);
                
                return redirect('review');
        }

        /*Here checking if conddition for clicking on reply button
         * @return review
         */
        if ($operation == 'reply') {
            DB::table('reviews')
              ->insert([
                    'parent_id' => $reviewid, 
                    'user_id' => $user->id,
                    'review_name' => $reply
                    ]);
            
            return redirect('review');
        }
    }    
}
