<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GridController extends Controller {
    public function gridusers(Request $request) {
		$page = $request['page']; 
		$limit = $request['rows']; 
		$sidx = $request['sidx']; 
		$sord = $request['sord']; 

        if (!$sidx) $sidx = 1; 
                     
        $rows = DB::table('users')->get();
		$i = 0;

        foreach ($rows as $row) {
            $response->rows[$i]['id'] = $row->id;
			$response->rows[$i]['cell'] = array(
		                                $row->firstname,
						             	$row->lastname,
							            $row->sex, 
                                        $row->dob,
							            $row->marital,
							            $row->street,
                                        $row->city,
							            $row->state,
                                        $row->phone,
							            $row->email,
							        );

                $i++;
       	}

		return json_encode($response); 
	}
	
	//This is the method to Update users data into database using jqgrid
	public function UpdateInfo(Request $request) {
		$page = $request['page']; 
		$limit = $request['rows']; 
		$sidx = $request['sidx']; 
		$sord = $request['sord']; 
		$search_field = $request['searchField'];
	    $search_string = $request['searchString'];
        
        $firstname = $request['firstname'];
		$lastname = $request['lastname'];
		$sex = $request['sex'];
		$marital = $request['marital'];
		$dob = $request['dob'];
		$street = $request['street'];
		$city = $request['city'];
		$state =$request['state'];
		$phone = $request['phone'];
		$email = $request['email'];
	    $id = $request['id'];
       
        //cheching the condition for deleting data
        if ($request['oper'] == 'del') {
		   DB::table('users')
		     ->where('id',$id)
		     ->delete();				
		}
		
		//For Updating Data using Jqgrid
		if ($request['oper'] == 'edit') {
            try {    
	           	$user = User::find($id);	
			    $user->firstname = $firstname;
			    $user->lastname = $lastname;
			    $user->sex = $sex;
			    $user->marital = $marital;
			    $user->dob = $dob;
			    $user->street = $street;
			    $user->city = $city;
			    $user->state = $state;
			    $user->phone = $phone;
			    $user->email = $email;	
	            $user->save();
	            
                return Redirect('UpdateInfo')
                      ->with('status', 'Record updated Successfully');
     	  	}
		  
		    catch (Exception $e) {
		        $e->getMessage();
		    }					

		}
		
	    //Searching Users Data Using Jqgrid
	    if ($request['oper'] == 'search') {
	       $i=0;
		}
		
    }
}
