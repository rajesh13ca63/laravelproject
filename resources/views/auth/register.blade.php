@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 align="center"> Registration Form</h3>
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
                            <form id="register" enctype="multipart/form-data"              
                            method="post" action="{{ url('/register') }}" >
                            {!! csrf_field() !!}                             
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>1.User Name </label>
                                        <input type="text" name="name" value="{{old('name')}}" placeholder="User Name" class="form-control">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>2.Password</label>
                                        <input type="password" name="password" id="password" 
                                        value="{{old('password')}}" placeholder="Password" 
                                        class="form-control">
                                    </div>                         
                                    <div class="col-sm-4 form-group">
                                        <label>3.Confirm Password</label>
                                        <input type="password" name="password_confirmation"  
                                        value="{{old('password_confirmation')}}" placeholder="Confirm Password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>4.First Name</label>
                                        <input type="text" name="firstname" id="firstname" 
                                        value="{{old('firstname')}}" placeholder="First Name" 
                                        class="form-control">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>5.Middle Name</label>
                                        <input type="text" name="midname" id="midname" 
                                        value="{{old('midname')}}" placeholder="Middle Name" 
                                        class="form-control">
                                    </div>                                       
                                    <div class="col-sm-4 form-group">
                                        <label>6.Last Name</label>
                                        <input type="text" name="lastname" id="lastname" 
                                        value="{{old('lastname')}}" placeholder="Last Name" 
                                        class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>7.Gender</label>    
                                        <div class="radio">                       
                                            <label><input type="radio" name="sex" id="sex" 
                                            value="male" {{ old('sex') == 'male' ? 'checked="checked"' : '' }} >Male</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="sex" id="sex" 
                                            value="female" {{ old('sex') == 'female' ? 'checked="checked"' : '' }}>Female</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>8.Marital Status</label>  
                                        <div class="radio">
                                           <label><input type="radio" name="marital" id="marital" value="maried" {{ old('marital') == 'maried' ? 'checked="checked"' : '' }}>Maried</label>
                                        </div>
                                        <div class="radio"> 
                                            <label><input type="radio" name="marital" id="marital" value="unmaried" {{ old('marital') == 'unmaried' ? 'checked="checked"' : '' }}>Unmaried</label>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>9.Date of Birth</label>
                                        <input  type="text" name="dob" id="dob" value="{{old('dob')}}" placeholder="dob">
                                    </div>
                                </div>
                                <!--Residence Address in Html form-->                  
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <h3>Residence Address</h3><br>
                                        <label>Street</label> 
                                        <input type="text" name="street" id="street" value="{{old('street')}}" placeholder="Enter Street Address" 
                                        class="form-control">
                                        <label>City</label> 
                                        <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="Enter City Name" class="form-control">
                                        <label>State</label> 
                                        <input type="text" name="state" id="state" 
                                        value="{{old('state')}}" placeholder="Enter State Name" 
                                        class="form-control">
                                        <label>Zip Code</label>
                                        <input type="text" name="zip" id="zip" value="{{old('zip')}}" placeholder="Enter Zip Code" 
                                        class="form-control">
                                        <label>Phone Number</label>
                                        <input type="text" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter Phone number" 
                                        class="form-control">
                                        <label>Email Address</label>
                                        <input type="text" id="email" name="email" 
                                        value="{{old('email')}}" placeholder="Enter your email" 
                                        class="form-control">
                                    </div>      
                                    <!--Office Addres in html form-->
                                    <div class="col-sm-6 form-group">
                                        <h3>Office Address</h3><br>
                                        <label>Street</label>
                                        <input type="text" name="offstreet" id="offstreet" 
                                        value="{{old('offstreet')}}" 
                                        placeholder="Enter Street Address"
                                        class="form-control">
                                        <label>City</label>
                                        <input type="text" name="offcity" id="offcity" 
                                        value="{{old('offcity')}}" placeholder="Enter City Name" class="form-control">
                                        <label>State</label>
                                        <input type="text" name="offstate" id="offstate" 
                                        value="{{old('offstate')}}" placeholder="Enter State Name" 
                                        class="form-control">
                                        <label>Zip Code</label>
                                        <input type="text" name="offzip" id="offzip" 
                                        value="{{old('offzip')}}"
                                        placeholder="Enter Zip Code" class="form-control">
                                        <label>Phone Number</label>
                                        <input type="text" name="offphone" id="offphone" 
                                        value="{{old('offphone')}}" placeholder="Enter Mob Number" class="form-control">
                                        <label>Email Address</label>
                                        <input type="text" name="offemail" id="offemail" 
                                        value="{{old('offemail')}}" placeholder="Enter Email Address" class="form-control">
                                    </div>      
                                </div>
                                <!--HTML Code for IMAGE And Comment-->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>UploadImage</label>
                                        <input type="file" name="image"
                                         class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">               
                                        <label>Comment</label>
                                        <textarea name="comment" value="{{old('comment')}}" row="5" class="form-control">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label><h4>Captcha</h4></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" 
                                        name="captcha">
                                    </div>
                                </div>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary" 
                                    name="register" onclick="loaderfun()" >
                                    <i class="fa fa-btn fa-user"></i>Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="loader hide"></div>
@endsection
<script>
function loaderfun(){
document.getElementsByClassName("loader");
}
</script>


