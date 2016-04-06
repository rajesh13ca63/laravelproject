$(document).ready(function() {
	  //fist admin values is shows on screen 
	    var userid = $('#role_name').val();
	        $.ajax({
	                method: "GET",
	                url: "manageprivilegejs",
                    data: {
	                       userid: userid
	                },
	                success:function(msg) {
	                	    $('#tab').html(msg);
	                }
	        });

       //Afteer changing the role it will works like Admin, Teacher, superadmin
	   $("#role_name").on("change", function(){
	       var username = $('#role_name').val();
	        $.ajax({
	                method: "GET",
	                url: "manageprivilegejs",
                    data: {
	                       userid: username
	                },
	              
                    success:function(msg) {
	                        $('#tab').html(msg);
	                }
	        });
	   });

	$('#dob').datepicker({
            format: "yyyy-dd-mm"
    });  
});

//after changing the checkbox value it will works
function changeprivilege(result, role, resource_id, action_id) {   
	$.ajax({
        method: 'GET',
        url: 'privilegepost',
        dataType: 'json',
        data: {
          result:result,
          resource_id: resource_id,
          role: role,
          action_id: action_id
        },

        success: function(response) {
        }
    });   

   
}

