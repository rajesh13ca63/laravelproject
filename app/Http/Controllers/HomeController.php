<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Socialize;
use Socialite;

class HomeController extends Controller {
     
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('isActive');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    //This is the method to activate link 
    public function activateAccount($link) {
       
        $activelink = DB::table('users')
          ->select('link')
          ->where('link',$link)
          ->first();
        
        if ($activelink) {
            DB::table('users')
              ->where('link', $activelink->link)
              ->update(['activate' => 1]);

            return redirect('login')->with('status', 'Your account is now active');
        
        } else {
            
            return redirect('login')->with('status', 'Invalid url.');
        }               
    }
}
