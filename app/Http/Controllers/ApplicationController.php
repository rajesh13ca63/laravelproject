<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

class ApplicationController extends Controller {
    public function postapplication(Request $request) {
         $this->validate($request, [
        'name' => 'required',
        'mobileno' => 'required | numeric',
        'post' => 'required',
        'resume' => 'required',
        'degree' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        $result = DB::table('application')
                   ->insert([
                       'userid' => $user->id,
                       'name' => $request['name'],
                       'post' => $request ['post'],
                       'mobileno' => $request['mobileno'],
                       'degree' => $request['degree'],
                       'resume' => $request['resume']
                    ]);

        if ($result) {
          
            return redirect('career')
            ->with('status', 'Successfully! Application Submited');
        }
    }
}
