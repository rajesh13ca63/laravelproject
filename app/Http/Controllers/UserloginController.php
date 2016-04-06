<?php
namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserloginController extends Controller {
    
    public function authenticate(Request $request)  {
	    $email = $request['email'];
        $password = bcrypt($request['password']);
        
        if (Auth::attempt(['email' => $email, 'password' => $password, 'activate' => 1])) {
            // Authentication passed...
            return redirect('/home');
        }
               
        return redirect('/login');   
    }
}