@extends('layouts.app')
@section('content')
<div class="container">
    <form name="f">
    	<title>Gridview using jQuery DataTable plugin</title>
    	<input type="hidden" name="_token" 
    	value="<?php echo csrf_token(); ?>">
    	<table id="list_records"></table> 
    	<div id="perpage"></div>
	</form>
</div>
<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Display all tweets</h4>
                </div>
	            <div class="modal-body">
	               <p id ="tweets"></p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection
