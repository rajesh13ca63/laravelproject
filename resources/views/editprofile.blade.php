@extends('layouts.app')
@section('content')
<div class="container">
     <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 align="center">Update Profile</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 well"> 
                    <div class="row">
                        <div class="col-sm-12" id="errorDiv">
                            @if (isset($errors) && count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(session('status'))
                        <div class="alert alert-success">
                        {{session('status')}}
                        </div>
                    @endif
                    <form id="register" enctype="multipart/form-data"            method="post" action="{{url('/getupdate')}}"> 
                    {!! csrf_field() !!}                             
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>1.First Name</label>
                            <input type="text" name="firstname" id="firstname" 
                            value="{{$user->firstname}}" placeholder="First Name" 
                            class="form-control">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>2.Middle Name</label>
                            <input type="text" name="midname" id="midname" 
                            value="{{$user->midname}}" placeholder="Middle Name" 
                            class="form-control">
                        </div>                                       
                        <div class="col-sm-4 form-group">
                            <label>3.Last Name</label>
                            <input type="text" name="lastname" id="lastname" 
                            value="{{$user->lastname}}" placeholder="Last Name" 
                            class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>4.Gender</label>    
                            <div class="radio">                       
                                <label><input type="radio" name="sex" id="sex" 
                                value="male" {{ $user->sex == 'male' ? 'checked="checked"' : ''}}>Male</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="sex" id="sex" 
                                value="female" {{$user->sex == 'female' ? 'checked="checked"' : '' }}>Female</label>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>5.Marital Status</label>  
                            <div class="radio">
                               <label><input type="radio" name="marital" id="marital" value="maried" {{$user->marital == 'maried' ? 'checked="checked"' : '' }}>Maried</label>
                            </div>
                            <div class="radio"> 
                                <label><input type="radio" name="marital" id="marital" value="unmaried" {{$user->marital == 'unmaried' ? 'checked="checked"' : '' }}>Unmaried</label>
                           </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>6.Date of Birth</label>
                            <input  type="text" name="dob" id="dob"
                            value="{{$user->dob}}">   
                        </div>
                    </div>
                    <!--Residence Address in Html form-->                  
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <h3>Residence Address</h3><br>
                            <label>Street</label> 
                            <input type="text" name="street" id="street" 
                            value="{{$user->street}}" placeholder="Enter Street Address" class="form-control">
                            <label>City</label> 
                            <input type="text" name="city" id="city" value="{{$user->city}}" placeholder="Enter City Name" class="form-control">
                            <label>State</label> 
                            <input type="text" name="state" id="state" 
                            value="{{$user->state}}" placeholder="Enter State Name" 
                            class="form-control">
                            <label>Zip Code</label>
                            <input type="text" name="zip" id="zip" value="{{$user->zip}}" placeholder="Enter Zip Code" class="form-control">
                            <label>Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{$user->phone}}" placeholder="Enter Phone number" class="form-control">
                            <label>Email Address</label>
                            <input type="text" id="email" name="email" value="{{$user->email}}" placeholder="Enter your email" class="form-control">
                        </div>      
                        <!--Office Addres in html form-->
                        <div class="col-sm-6 form-group">
                            <h3>Office Address</h3><br>
                            <label>Street</label>
                            <input type="text" name="offstreet" id="offstreet" value="{{$user->offstreet}}" placeholder="Enter Street Address" 
                            class="form-control">
                            <label>City</label>
                            <input type="text" name="offcity" id="offcity" 
                            value="{{$user->offcity}}" placeholder="Enter City Name" 
                            class="form-control">
                            <label>State</label>
                            <input type="text" name="offstate" id="offstate" value="{{$user->offstate}}" placeholder="Enter State Name" 
                            class="form-control">
                            <label>Zip Code</label>
                            <input type="text" name="offzip" id="offzip" 
                            value="{{$user->offzip}}"
                            placeholder="Enter Zip Code" class="form-control">
                            <label>Phone Number</label>
                            <input type="text" name="offphone" id="offphone" 
                            value="{{$user->phone}}" placeholder="Enter Phone Number" 
                            class="form-control">
                            <label>Email Address</label>
                            <input type="text" name="offemail" id="offemail" 
                            value="{{$user->offemail}}" placeholder="Enter Email Address" class="form-control">
                        </div>      
                    </div>
                        <!--HTML Code for IMAGE And Comment-->
                        <div class="row">
                            <div class="col-sm-6">
                                <label>UploadImage</label>
                                <input type="file" name="image" value="{{$user->image}}"
                                class="form-control"><br/>
                                <img src="image/{{$user->image}}"/>
                            </div>
                            <div class="col-sm-6 form-group">               
                                <label>Comment</label>
                                <textarea name="comment" row="5" class="form-control">{{$user->comment}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-5"></div>
                        <div>
                            <button type="submit" class="btn btn-primary" >
                            <i class="fa fa-btn fa-user"></i>Update</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
      </div>
    </div>
  </div>
</div>
@endsection
