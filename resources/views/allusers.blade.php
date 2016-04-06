@extends('layouts.app')
@section('content')
<div class="container">
   <h1 class="well" align="center">Adminstration Page</h1>
   <!--Role Assign to a particuler user-->
    <div class="jumbotron">
        @if (session('operation'))
            <div class="alert alert-success">
                {{ session('operation') }}
            </div>
        @endif
        <form id="role" enctype="multipart/form-data" method="post" action="{{url('/postrole')}}">{!! csrf_field() !!}  
            <h3>Role Description </h3><br>
                <div class="row">
                    <div class="col-sm-3 form-group">                
                        <div>
                            <h4>Select UserName</h4>
                        </div>   
                        <select name='users' id='users' >
                            <option value="0">Select</option>
                            @foreach($rows as $user) 
                                <option value="{{ $user->id }}">
                                {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>                    
                    <!--Php code here-->
                    <div class="col-sm-3 form-group">                 
                        <div>
                            <h4>User Type</h4>
                        </div>   
                        <select name='role' id='role'>
                            <option value="0">select</option>
                            @foreach($roles as $role) 
                                <option value="{{ $role->id }}">
                                {{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 offset-5 form-group">
                        <br/><br/>
                        <button type="submit" class="btn btn-primary"  name="submit" id="submit" value="Add">Add
                        </button>
                        <button type="submit" class="btn btn-danger" 
                        name="submit" id="submit" value="Delete">Delete
                        </button> 
                    </div>
                </div>
        </form>
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col-sm-3 form-group">
                <h3>Users Name</h3>
                @foreach($userassign as $user) 
                    <b>{{ $user->name }}</b><br>
                @endforeach
            </div>
            <div class="col-sm-3 form-group">
                <h3>Assigned Role</h3>
                @foreach($userassign as $role) 
                    <b>{{ $role->role_name }}</b><br/>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection