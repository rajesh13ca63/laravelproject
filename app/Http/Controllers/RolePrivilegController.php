<?php
namespace App\Http\Controllers;

use DB;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePrivilegController extends Controller {
	function usersinfo() {
		$rows = DB::table('users')->get();
		$roles = DB::table('roles')->get();
		
        /*
		Select the user id from users table then its corresponding name from users table
		*/
	    $userassign = DB::table('users')
		                ->join('roles', 'users.role', '=', 'roles.id')
		                ->select('users.name', 'roles.role_name')
		                ->get();
		
		return view('allusers', array('rows' => $rows,
			                          'roles' => $roles,
			                          'userassign' => $userassign,
			                        ));

	}
    
    //This is the method for show privileges after selecting role
	function privilegeusers() {
		$rows = DB::table('roles')
		          ->get();
        $data = array('rows' => $rows);

        return view('privilege', $data);
	}

	function roleresperm() {
	//Selecting Data From Database and Showing Role Resource and Perms
		$rows = DB::table('roles')
		          ->get();
		$resources = DB::table('resources')
		               ->get();
		$permissions = DB::table('permissions')
		                 ->get();
		
        return view('role', array(
        	                    'rows' => $rows,
        	                    'resources' => $resources,
        	                    'permissions' => $permissions
        	                    ));
	}

    //Inserting new Resources Role and Permissions
    function newroleresperm(Request $request) {
		$newrole = $request['newrole'];
		$newperm = $request['newpermission'];
		$newres = $request['newresource'];
		$operation = $request['submit'];
		$role = $request['role'];
		$resource = $request['resource'];
		$perm = $request['newperm'];

        //Deleting Existing Role Permission and Resources
        if ($operation == "DeleteRole") {
            DB::table('roles')
              ->where('role_name',$role )
              ->delete();   
            return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');
        }

        if ($operation == "DeleteResource") {
            DB::table('resources')
              ->where('resource_name',$resource )
              ->delete();
              
            return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');  
        }

        if ($operation == "DeletePermission") {
            DB::table('permissions')
              ->where('permission_name',$perm )
              ->delete(); 
            return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');  
        }
        
	    if ($newrole == "" && $newperm == "" && $newres == "") {
           
            return redirect('roleresourceperm')->with('status','Please Enter Text Value');
	    }

	    //Adding NewResource ,NewRole And NewPermission
		if ($operation == "AddRole") {
            DB::table('roles')
              ->insert(['role_name' => $newrole]);

            return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');

        } elseif ($operation == "AddResource") {
            DB::table('resources')
              ->insert(['resource_name' => $newres]);

            return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');

        } elseif ($operation == "AddPermission") {
            DB::table('permissions')
              ->insert(['permission_name' => $newperm]);

              return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');
        }
    }
    
    //This is Role Change Method, After selecting Username
	function rolechange(Request $request) {
		$roleid = $request['role'];
		$userid = $request['users'];
		$operation = $request['submit'];
		
		if ($roleid == 0 || $userid == 0) {
			
			return redirect('allusers')->with('operation', 'Please Select Username/UserType');
		}

        if ($operation == 'Add') {
			DB::table('users')
		      ->where('id', $userid)
			  ->update(['role' => $roleid]);

			return redirect('allusers')->with('operation', 'Records Successfully Updated');
		 }
		 
        if ($operation == 'Delete') {
			DB::table('users')
	          ->where('id', $userid)
		      ->update(['role' => '0']);

		  return redirect('allusers')->with('operation', 'Records Successfully Updated');
		}
		
	}
}
