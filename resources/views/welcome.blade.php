<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
           <img src="image/logo.jpeg" width="90"> 
        </div>
        <div class="col-sm-6">
            <h2><b>Mindfire Solutions</b></h2>
            <h3> &nbsp Bhubaneswar Odisha</h3>
        </div>
        <div>
            <b>Contact us</b>
            <p><span class="glyphicon glyphicon-phone"></span> mob no:+919199116956</p>
            <p><span class="glyphicon glyphicon-envelope"></span> email:rajesh@gmail.com
            </p>
        </div>
    </div>
</div>
@extends('layouts.app')
@section('content')
<div class="container">
    @if (Session::get('status'))
        <div class="alert alert-success">
           {{ Session::get('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Mindfire Solutions</div>

                <div class="panel-body">
                    <img src="image/dlf.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Adding google map on Main Home Page-->
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:200px;width:250px;'><div id='gmap_canvas' style='height:200px;width:250px;'></div><div><small><a href="http://embedgooglemaps.com">       embed google map</a>    </small></div><div><small>
    <a href="http://freedirectorysubmissionsites.com">directory submission sites</a>
    </small></div>
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
    </div>
    <script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(20.2960587,85.82453980000003),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.2960587,85.82453980000003)});infowindow = new google.maps.InfoWindow({content:'<strong>Mindfire</strong><br>bhubaneswar<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
    </script>
@endsection
