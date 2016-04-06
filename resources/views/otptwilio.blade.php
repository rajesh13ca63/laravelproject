@extends('layouts.app')
@section('content')
<!--Doctype HTML Code for OTP Form-->
<div class="container">
    <div class="row">
    <aside class="col-sm-3" ></aside>
        <div class="col-sm-6">
            <div class="jumbotron">
         		<form  name="f" method="post" action="otptwilio.php">
        		    <div class="form-group">
                        <h4>Please Type Your OTP!</h4>
                        <label>  </label>
                        <input type="text" name="otp" id="otp" placeholder="PTP!">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection