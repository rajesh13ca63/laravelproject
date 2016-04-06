@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="well"  align="center"> Personal Information</h3>
        <div class="col-lg-12 well">
            <div class="row">
				<div class="col-sm-3 form-group">
					<label>First Name:</label>
					<label>{{ $user->firstname }}</label><br/>
					<label>Marital Status:</label>
					<label>{{ $user->marital }}</label>
				</div>
				<div class="col-sm-3 form-group">
					<label>Last Name:</label>
					<label>{{ $user->lastname }}</label><br/>
					<label>Gender:</label>
					<label>{{ $user->sex }}</label>
				</div>
				<div class="col-sm-3 form-group">
					<label>Username:</label>
					<label>{{ $user->name }}</label><br/>
					<label>DOB:</label>
					<label>{{ $user->dob }}</label>
				</div>
		   		<div class="col-sm-3">
					<img id="blah" src="image/{{ $user->image }}" alt="your image" width="70%"/>
				</div>
			</div>

			<div class="row">
		        <div class="col-sm-6 form-group">
			        <h3>Residential Address</h3>
			        <div>
				    	<label>Street:</label>
						<label>{{ $user->street }}</label>
				    </div>
				    <div>
					    <label>City :</label>
						<label>{{ $user->city }}</label>
				    </div>
				    <div>
						<label>State :</label>
						<label>{{ $user->state }}</label>
			        </div>
			        <div>
						<label>Zip   :</label>
						<label>{{ $user->zip }}</label>
				    </div>
				    <div>
					    <label>Phone no   :</label>
						<label>{{ $user->phone }}</label>
				    </div>
				    <div>
						<label>Email ID   :</label>
						<label>{{ $user->email }}</label>
					</div>
				</div>
				<div class="col-sm-6 form-group">
				    <h3>Office Address</h3>
				    <div>
						<label>Street:</label>
						<label>{{ $user->offstreet }}</label>
				    </div>
				    <div>
						<label>City  :</label>
						<label>{{ $user->offcity }}</label>
				    </div>
				    <div>
						<label>State :</label>
						<label>{{ $user->offstate }}</label>
				    </div>
				    <div>
						<label>Zip   :</label>
						<label>{{ $user->offzip }}</label>
				    </div>
				    <div>
						<label>Phone no   :</label>
						<label>{{ $user->offphone }}</label>
				    </div>
				    <div>
						<label>Email Id   :</label>
						<label>{{ $user->offemail }}</label>
					</div>
					<div>
						<label>Comment  :</label>
						<label>{{ $user->comment }}</label>
					</div>
				</div>
			</div><!-- end of the address -->
		<div class="row"> </div>
	 </div>
   </div>
</div>
@endsection