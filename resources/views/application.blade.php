@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Application Form</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/postapplication') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : 
                            '' }}">
                            <label class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" 
                                value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('post') ? 
                            ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Post</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="post"
                                value="{{ old('post') }}">
                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('degree') 
                            ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Heighest Degree</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="degree" 
                                value="{{ old('degree') }}">
                                @if ($errors->has('degree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobileno') ? ' has-error' : 
                            '' }}">
                            <label class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input type="text"  name="mobileno" class="form-control"
                                value="{{ old('mobileno') }}">
                                @if ($errors->has('resume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobileno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('resume') ? ' has-error' : 
                            '' }}">
                            <label class="col-md-4 control-label">Upload Resume</label>
                            <div class="col-md-6">
                                <input type="file"  name="resume" 
                                value="{{ old('resume') }}">
                                @if ($errors->has('resume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Apply
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
