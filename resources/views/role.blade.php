@extends('layouts.app')
@section('content')
<!--HTML Code for Loginpage-->
<div class="container">
    <h1 class="well" align="center">Adminstration Page</h1>
   <!--Role Adddition and Deletion-->
        <div class="jumbotron">
        @if (session('operation'))
            <div class="alert alert-success">
                {{ session('operation') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <form id="role" enctype="multipart/form-data" method="post" 
        action="{{url('/roleresourceperm')}}">{!! csrf_field() !!}            
            <h3>Role Description </h3><br>
            <div class="row form-group">
                <div class="col-sm-3 form-group">                       
                    <label>Add New Role</label>
                    <input type="text" name="newrole"  id="newrole">
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <button type="submit" class="btn btn-primary" name="submit" 
                    id="submit" value="AddRole">Add</button>
                </div>
                <div class="col-sm-3 form-group"><br/>
                   <select name='role' id='role' >
                        @foreach($rows as $row) 
                            <option value="{{ $row->role_name}}">
                            {{ $row->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <button type="submit" class="btn btn-danger" name="submit" 
                    id="submit" value="DeleteRole">Delete </button>
                </div>
            </div>
            <!--Add new Resources here-->
            <h3>Resource Description </h3><br>
            <div class="row form-group">
                <div class="col-sm-3 form-group">                       
                    <label>Add New Resource</label>
                    <input type="text" name="newresource"  id="newresource">
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <button type="submit" class="btn btn-primary" name="submit" 
                    id="submit" value="AddResource">Add</button>
                </div>
                <div class="col-sm-3 form-group"><br/>
                   <select name='resource' id='resource' >
                        @foreach($resources as $row) 
                            <option value="{{ $row->resource_name}}">
                            {{ $row->resource_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <button type="submit" class="btn btn-danger" 
                    name="submit" id="submit" value="DeleteResource">Delete </button>
                </div>
            </div>
            <!--Add/Delete Permission here-->
            <div class="row form-group">
                <h3>Permission Description </h3><br>
                <div class="col-sm-3 form-group">                       
                    <label>Add New Permission</label>
                    <input type="text" name="newpermission"  
                    id="newpermission">
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <button type="submit" class="btn btn-primary" 
                    name="submit" id="submit" value="AddPermission">Add
                    </button>
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <select name='newperm' id='newperm' >
                        @foreach($permissions as $row) 
                            <option value="{{ $row->permission_name}}">
                            {{ $row->permission_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 form-group"><br/>
                    <button type="submit" class="btn btn-danger"
                    name="submit" id="submit" value="DeletePermission">Delete </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection