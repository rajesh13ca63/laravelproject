$(document).ready(function() {
	  //username existing checking 
	   $("#tweetusers").on("change", function(){
	        $('#tweetid').val();
	        var username = $('#tweetusers').val();

	        $.ajax({
	                method: "POST",
	                url: "tweetchange.php",

	                data: {
	                       username: username
	                },
	                
	                success:function(msg) {
	                	    console.log(msg);
	                        $('#tweetid').val(msg);
	                             
	                }
	        });
	   });
	});
