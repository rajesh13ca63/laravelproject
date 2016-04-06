<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PrivilegeController extends Controller {
    function manageprivilege(Request $request) {
			$role = $request['userid'];
			$outputTable = '';
	        $permissions = DB::table('permissions')->get();
	        
	        foreach ($permissions as $row) {
	            $actionInfo[] = $row;
	        }
	      
		    //fetching the data from role_perm table 
		    $rows = DB::table('role_perm')
		               ->where('role_id', $role)
		               ->get();
		   
		    foreach ($rows as $row) {
		        $arr[$row->role_id . '-' . $row->resource_id . '-' . $row->permission_id] = true;
		    }
		    
		    //Fetching the data from roles table and collect it into user
		    $users = DB::table('roles')
		               ->where('id', $role)
		               ->get();

		    foreach ($users as $row) {
		    	$user = $row->role_name;
		    }

		    //Fetching id and name from Resource Table
		    $rows = DB::table('resources')->get();
		    $count = 0;

		    foreach ($rows as $resource ) {
		    	$resources[$count]['id'] = $resource->id;
		    	$resources[$count]['resource_name'] = 
		    	$resource->resource_name;
		    	$count =  $count + 1;
		    }

		    foreach ($resources as $resource) {
		        $outputTable .= '<table id="res">
		        <tr><td>'. $resource['resource_name'].'</td><td><td>&nbsp;&nbsp;&nbsp;</td><td>';

		    foreach ($actionInfo as $action) {
		        $outputTable .='<input type="checkbox" '.'onchange="changeprivilege(this.checked,'.$role.','.$resource["id"].','.$action->id.') " name="check['. $resource['id'] .'][]" id="check" value="'  . $action->id  .' " '. (isset($arr[$role. '-' .$resource["id"]. '-' .$action->id] ) ? 'checked="checked"' : '').' /> '.$action->permission_name . '&nbsp;&nbsp;';
		    }
		        $outputTable .= '</td></tr></table>';
		    }

		    return  $outputTable;
		}
      
        /* 
        This is the Method to Update the data in Privileges which is assigned by admin for more operation like edit ,delete, view and all
        */
	    function privilegpost(Request $request) {
	       
	       if ($request['role'] && $request['resource_id'] &&
	        $request['action_id']) {
	       	
	        $role = $request['role'];
	        $resource_id = $request['resource_id'];
	        $permission_id = $request['action_id'];
	        $result = $request['result'];
	        
	        if ($result === 'true') {
		        DB::table('role_perm')
		          ->insert(['role_id' => $role,
		                    'permission_id' => $permission_id,
		                    'resource_id' => $resource_id]);
	        }
	        
	        if ($result === 'false') {  
		        DB::table('role_perm')
		          ->where('role_id', $role) 
		          ->where('resource_id', $resource_id)
		          ->where ('permission_id', $permission_id)
		          ->delete(); 
	        }
	    }
	}
}


