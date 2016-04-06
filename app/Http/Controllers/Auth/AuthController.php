<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use \Laravel\Socialite\Socialite;
use Validator;
use Session;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $redirectTo = '/home';
    
      
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:25',
            'email' => 'required | email |max:255 | unique:users',
            'password' => 'required|confirmed|min:6',
                             
    	    'firstname' => 'required | alpha',
    	    'lastname' => 'required | alpha',
    	    'sex' => 'required',
    	    'marital' => 'required',
    	    'dob' => 'required',

    	    'street' => 'required',// |regex:/(^[A-Za-z]+$)+/',
    	    'state' => 'required | alpha',
    	    'zip'  => 'required | numeric',
    	    'phone' => 'required | numeric',
            'image'=>'required',
        ]);                 
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {  

        $this->redirectTo = ('/logout');

	    $image = $data['image'];
        $destinationPath = 'image';
        
        if (!$image->move($destinationPath, $image->getClientOriginalName())) {
            
            return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        }

        $iamge = $image->getClientOriginalName();

        //Generating a string withe 15 length
        $link = str_random(15);

        //Sending mail after successfull registrations to the user emailid
        $name = $data['name'];
        $email = 'rajeshkumargupta001@gmail.com';

        Mail::send('regemail', ['user' => $name, 'link' => $link], function ($message) use ($email) {
            $message->from('rajeshkumargupta001@gmail.com', 'Your Application');
            $message->to($email, $email)->subject('Your Registration');
        });

        Session::flash('status', 'Successfully Registration Completed');
        

	    return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            
            'firstname' => $data['firstname'],
            'midname' => $data['midname'],
            'lastname' => $data['lastname'],
            
            'sex' => $data['sex'],
            'marital' => $data['marital'],
            'dob' => $data['dob'],
            
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'phone' => $data['phone'],

            'offstreet' => $data['offstreet'],
            'offcity' => $data['offcity'],
            'offstate' => $data['offstate'],
            'offzip' => $data['offzip'],
            'offphone' => $data['offphone'],
            'offemail' => $data['offemail'],
           
            'image' => $iamge,
            'comment' => $data['comment'],
            'link' => $link
           
        ]);
    }


    /*facebook Loing by user*/
    public function redirectToProvider() {

        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    echo '<pre>'; print_r($user); exit;
        $authUser = $this->findOrCreateUser($user);

        // Auth::login($authUser, true);
 
        return redirect()->route('home');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser) {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
 
        if ($authUser) {
            
            return $authUser;
        }
 
        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar
        ]);
    }
}
