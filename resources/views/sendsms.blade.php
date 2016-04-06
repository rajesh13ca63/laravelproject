@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Send Free Sms</div>
                <form class="form-horizontal" role="form" method="POST" 
                    action="{{ url('sendmess') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Write Sms</label>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile no</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <textarea row="5" placeholder="write sms" name="sms">
                                </textarea>
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="Mob no" name="mobno">
                            </div>
                            <div class="cos-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection