@extends('layouts.app')
@section('content')
<!--HTML Code for Loginpage-->
<div class="container">
    <h1 class="well" align="center">Role Privileges</h1>
    <div class="jumbotron">
        <form id="role" enctype="multipart/form-data" method="post" action="{{url('/privilege')}}">{!! csrf_field() !!}            
            <h3>Role Description </h3><br>
            <div class="row">
                <div class="col-sm-3 offset-3 from-group">
	                <h3>Roles </h3><br>
	            </div>
	        </div>
	        <div class="row">
		        <div class="col-sm-3 form-group">                       
		            <div>
		                <h4>Select Role</h4>
		            </div>
	                <select name='role_name' id='role_name' >
                        @foreach($rows as $row) 
                            <option value="{{ $row->id }}">
                            {{ $row->role_name }}</option>
                        @endforeach
                    </select>
	            </div>
	        <div id="tab"></div>
        </form>
    </div>
</div>

@endsection
