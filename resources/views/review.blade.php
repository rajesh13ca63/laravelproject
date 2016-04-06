@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Review</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" 
                            action="{{ url('reviewPost') }}">{!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <img src="image/dlf.jpeg">
                                </div>
                                <div class="col-md-6 form-group"><h3>About</h3>
                                    This is the bigest organization of the world for software development.
                                </div>
                            </div>
                            @if($roles->role == 2)
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="post" 
                                    id="post"></textarea>
                                    
                                    <div class="col-sm-3 col-sm-offset-10" ><br/>
                                        <button type="submit" name="submit" value="comment"
                                        class="btn btn-primary">
                                        <i class="glyphicon glyphicon-envelope"></i>       comment
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>
                   
                        @if(count($post)>0)
                            @foreach($post as $userpost)
                                <div class="jumbotron">
                                    <form class="form-horizontal" role="form" method="POST"    action="{{ url('reviewPost') }}">
                                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <img src="image/{{ $userpost['image'] }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    {{ $userpost['name'] }} <br/>
                                                </div>
                                                <div class="col-sm-6">
                                                {{ $userpost['review_name'] }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 form-group">
                                                <img src="image/{{ $userpost['image'] }}" 
                                                >
                                            </div>
                                            <div class="col-sm-9 form-group">
                                                <textarea class="form-control" rows="1"
                                                name="subpost" id="subpost">
                                                </textarea><br/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 form-group" >
                                                <input type="hidden" name="review_id" 
                                                value="{{ $userpost['review_id'] }}">
                                                <button type="submit" name="submit" value="like"
                                                class="btn btn-primary btn-xs">
                                                <i class="glyphicon glyphicon-thumbs-up"></i>Like
                                                @if($userpost['like'])
                                                    {{ $userpost['like'] }} 
                                                @endif
                                                </button>
                                            </div>
                                            <div class="col-sm-2 form-group" >
                                                <button type="submit" name="submit" 
                                                value="reply" id="reply_id"
                                                class="btn btn-primary btn-xs">Reply
                                                </button>
                                            </div> 
                                        </div>
                                        @if(!empty($userpost['subcomments']))
                                        @foreach($userpost['subcomments'] as $sub)
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <img src="image/{{ $sub['image'] }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    {{ $sub['name'] }} <br/>
                                                </div>
                                                <div class="col-sm-6">
                                                {{ $sub['review_name'] }}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </form>
                                </div>
                            @endforeach
                        @endif
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
