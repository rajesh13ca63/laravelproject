<?php
//Using method for twilio implementatison
    Route::get('sendmessage', 'TwilioController@sendmessage');
    Route::post('UpdateInfo', 'GridController@UpdateInfo');
       
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //Thsi route is used for welcome page
    Route::get('/', function () {
    return view('welcome');
    });

    Route::get('home', array('as' => 'home', 'uses' => function(){
        return view('home');
    }));

    //Routes for About the company and what technology used
    Route::get('about', function() {
        return view('about');
    });

    //Routes for Career and Application Form
    Route::get('career', function(){
        return view('career');       
    });
    Route::get('application', function(){
        return view('application');       
    });
    Route::post('postapplication', 'ApplicationController@postapplication');


    Route::get('regemail', function() {
        return view('regemail');
    })->middleware('auth');

    Route::get('roleresourceperm', function() {
        return view('role')->middleware('isAdmin');
    });
    Route::get('privilege', function() {
        return view('privilege')->middleware('isAdmin');
    });
    Route::get('profile', function () {
    return view('profile')->middleware('auth');
    });
   
   // Route::get('home', 'HomeController@index')->middleware('auth');
   
    Route::get('display', 'UserController@display')->middleware('auth');
   
    Route::get('allusers', 'RolePrivilegController@usersinfo')
    ->middleware('isAdmin');
    Route::get('getupdate', 'UserController@getupdate')->middleware('auth');
    Route::post('getupdate', 'UserController@update')->middleware('auth');
    
    //Routes are using for Role,Resource and Management
    Route::get('privilege', 'RolePrivilegController@privilegeusers') 
    ->middleware('isAdmin');
    Route::get('roleresourceperm', 'RolePrivilegController@roleresperm')
    ->middleware('isAdmin');;
    Route::post('roleresourceperm', 'RolePrivilegController@newroleresperm')
    ->middleware('isAdmin');
    Route::get('allusers', 'RolePrivilegController@usersinfo')
    ->middleware('isAdmin');
    
    //Routes are using for Grid Management
    Route::get('griduers', 'GridController@gridusers')->middleware('isAdmin');
    Route::get('griddemo', function() { return view('grid');  })
    ->middleware('isAdmin');
    Route::get('allTweets', 'TweetsController@viewTweets')->middleware('auth'); 
    
    /*Routes are using here for Admin control Privilege and Role Assigned to the exiting users
    */
    Route::get('privilegepost', 'PrivilegeController@privilegpost')
    ->middleware('isAdmin');;
    Route::post('postrole', 'RolePrivilegController@rolechange')
    ->middleware('isAdmin');
    Route::get('manageprivilegejs', 'PrivilegeController@manageprivilege')
    ->middleware('isAdmin');
   
    //These Routes are used for reivew display and review post
    Route::get('review', 'ReviewController@review')
    ->middleware('auth');
    Route::post('reviewPost', 'ReviewController@reviewPost')
    ->middleware('auth');

    //Creating method to activate linke 
    Route::get('activate/{link}','HomeController@activateAccount');
   // Route::post('home', 'UserloginController@authenticate')
    
    //These routes are used for facebook login
    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

    //Routes for search job and display job using mysite.com
    Route::get('searchjob', function() {
        return view('searchjob');
    });
    Route::get('joblist', function() {
        return view('joblist');
    });

    Route::resource('getjoblist', 'WebScraperController@Index');

    //Routes for send free sms by loginusers
    Route::get('sendsms', function(){
        return view('sendsms');
    });
    Route::post('sendmess','TwilioController@sendmessage');
});