@extends('layouts.app')
@section('content')

<div id="image" class="container fluid">
    <form class="form-horizontal" role="form" method="POST" 
        action="{{ url('getjoblist') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-7 col-md-offset-3">
            <div id="screen" class="jumbotron">
                <h2 align="center"> Select an Item for search.</h2><br/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <input type="search" class="form-control" name="search" placeholder="job search">
                            <i class="icon-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection