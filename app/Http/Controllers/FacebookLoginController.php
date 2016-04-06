<?php
namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Http\Requests;


class FacebookLoginController extends Controller {
    
    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
        //return Socialize::with('facebook')->redirect();
    }
    
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
            //$user = Socialize::with('facebook')->user();
        } catch (Exception $e) {
            
            return redirect('auth/facebook');
        }
 
        $authUser = $this->findOrCreateUser($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('home');
    } 
    
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)  {
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
