@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1>About Career</h1>
    <div class="row">
        <div class="col-sm-8">
            <p>Mindfire Solutions does NOT employ services of any external organization for our recruitment process, in any role at any stage. We do our OWN hiring COMPLETELY and nobody else - no placement consultant, no recruitment agent, no headhunting firm, no campus coordinator, nobody else at all - is involved in any way at all.

            Please do not believe people making false promises to place you at Mindfire Solutions, or to get you an interview slot, or influence hiring in any way - and definitely do not pay anything for such claims. If you do believe and interact with them, it is at your own risk and loss. Mindfire Solutions is not responsible in any way for such interactions.

            We respect people who add value to the organization with their innovative ideas and enthusiasm. A challenging environment is provided for overall growth of every individual..

            If you want to be the part of the winning team, kindly click on the urls below:</p>
        </div>
        <div class="col-sm-4">
            <div class="jumbotron">
                <h3>Why Choose Us</h3>
                <a href="{{url('application')}}">Apply her for job</a>
            </div>
        </div>
    </div>
</div>
@endsection
