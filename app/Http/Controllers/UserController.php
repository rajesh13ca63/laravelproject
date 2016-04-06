<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use Auth;
use Illuminate\Support\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller {
    public function index()	{
		return view('welcome');
	}

    //this is the method to fetching the values from database
    public function display(Request $req) {
    	$user = $req->user();
               
        return view('profile', array('user' => $user));
    }

    //This is the metho to edit user profile for future update
    public function getupdate(Request $req) {
  	    $user = $req->user();
        
        return view('editprofile', array('user' => $user));
    }

    /* This is the method to update the user database 
    Validation checking at the time of user Updation existing form after login*/
    public function update(Request $request) {
        $this->validate($request, [
        'firstname' => 'required | alpha',
        'lastname' => 'required | alpha',
        'sex' => 'required',
        'marital' => 'required',
        'dob' => 'required',
        'street'=> 'required |regex:/(^[A-Za-z]+$)+/',
        'state'=> 'required | alpha',
        'zip' => 'required | numeric',
        'phone' => 'required | numeric',
        'email' => 'required | email',
        'image' => 'mimes:jpeg,bmp,png'
        
        ]);
    
        $firstname = $request->input('firstname');
        $midname = $request->input('midname');
        $lastname = $request->input('lastname');
        $sex = $request->input('sex');
        $marital = $request->input('marital');
        $dob = $request->input('dob');
        
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zip = $request->input('zip');
        $phone = $request->input('phone');    
        $email = $request->input('email');

        $offstreet = $request->input('offstreet');
        $offcity = $request->input('offcity');
        $offstate = $request->input('offstate');
        $offzip = $request->input('offzip');
        $offphone = $request->input('offphone');    
        $offemail = $request->input('offemail');

        $image = $request->input('image');
        $comment = $request->input('comment');

        //IMAGE UPLOADING IN DATABASE
        $image = $request['image'];
        $destinationPath = 'image';

        if ($request->hasFile('image')) {
            if (!$image->move($destinationPath, $image->getClientOriginalName())) {
                return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
            }

            $image = $image->getClientOriginalName();
        }
    
        //Udating database using try and catch block
        try {    
            $user = User::find(Auth::user()->id);
               
            $user->firstname = $firstname;
            $user->midname = $midname;
            $user->lastname =$lastname;
            $user->sex = $sex;
            $user->marital = $marital;
            $user->dob = $dob;

            $user->street = $street;
            $user->city = $city;
            $user->state = $state;
            $user->zip = $zip;
            $user->phone = $phone;
            $user->email = $email;

            $user->offstreet = $offstreet;
            $user->offcity = $offcity;
            $user->offstate = $offstate;
            $user->offzip = $offzip;
            $user->offphone = $offphone;
            $user->offemail = $offemail;

            if (isset($image)) {
                $user->image = $image;
            }
            
            $user->comment = $comment;
         
            $user->save();

            return redirect('getupdate')->with('status', 'Profile Updated Successfully.');
        }
        catch (Exception $e) {
            $e->getMessage();
        }
    }
}

