$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        $("#list_records").jqGrid({
            url: "./griduers",
            editurl:"UpdateInfo",
            datatype: "json",
            mtype: "GET",
            colNames: [ "First Name", "Last Name",
                        "Gender", "Date of Birth", "Marital-Status",
                        "Street", "City", "State",
                        "Phone no", "Eamil Id","Tweets"
                        ],

            colModel: [
                { name: "firstname",width:100,editable:true},
                { name: "lastname",width:100,editable:true},
                { name: "sex",width:50,editable:true},
                { name: "dob",width:80, editable:true},
                { name: "marital",width:60, editable:true},
                { name: "street",width:100,editable:true},
                { name: "city",width:100, editable:true},
                { name: "state",width:100, editable:true},
                { name: "phone",width:100, editable:true},
                { name: "email",width:200, editable:true}, 
                { name: "tweet",width:100, editable:true}

            ],

            pager: "#perpage",
            rowNum: 15,
            rowList: [10,20],
            sortname: "id",
            sortorder: "asc",
            height: '100%',
            width: '1100',
            selectionmode: 'singlecell',
            multiselect: true,
            editable: true,
            viewrecords: true,
            gridview: true,
            stringResult:true,
            caption: "Personal Information",
            gridComplete: function(){
                
                var ids = jQuery("#list_records").jqGrid('getDataIDs');
                for(var i = 0;i<ids.length;i++){
                var cl = ids[i];
                be = "<input style='height:42px;width:40px;' type='button' value='Edit' onclick=\"jQuery('#list_records')";
                be += ".jqGrid('editRow','"+cl+"');\"  />"; 
                se = "<input style='height:42px;width:40px;' type='button' value='Save' onclick=\"jQuery('#list_records')";
                se += ".jqGrid('saveRow','"+cl+"');\"  />"; 
                ce = "<input style='height:42px;width:50px;' type='button' value='Cancel' onclick=\"jQuery('#list_records')";
                ce += ".jqGrid('restoreRow','"+cl+"');\" />"; 

                var tweet = "<input type='button' id='tweetid' class='btn btn-primary' value='tweets' data-toggle='modal' data-target='#myModal' style='height: 22px;width: 50px;' title='tweet' onclick=viewTweets(" + ids[i] + ")>";    
                 $("#list_records").jqGrid('setRowData', ids[i], { tweet: tweet });
                jQuery("#list_records").jqGrid('setRowData',ids[i],{act:be+se+ce+tweet});
                
                }
            }
    }); 
        $('#list_records').navGrid('#perpage', { 
                          edit: true, add: false,
                          del: true, search: true, 
                          refresh: true, view: true, 
                          position: "left", cloneToTop: true 
                          } );     
                 
        });
//Calling viewTweet Method
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

function viewTweets(userid){
    $.ajax({
        method: "GET",
        url: "allTweets",
        datatype: "json",
        data: {
               userid:userid
        },

        success:function(msg) {
            var json = JSON.parse(msg);
            console.log(json);
            $('#tweets').text("Display All Tweets"); 
            $('#tweets').html('<br>');
            for (var i = 0; i < json.length; i++) { 
                myDate = new Date(json[i].created_at);
                $('#tweets').append(
                '<img src="' + json[i].user['profile_image_url_https']+ '">'
                + json[i].user['name'] +' @' + json[i].user['screen_name'] +'<br/>'
                + (myDate.getMonth() + 1) + "/" + myDate.getDate() 
                + "/" + myDate.getFullYear() + "  " +
                myDate.getHours() + ":" + myDate.getMinutes() + ":" 
                + myDate.getSeconds() + '<br/>'
                + json[i].text +  '<br>'
                + json[i].user['location']  +'<br/>'+'<br/>'
                ); 
            }
        }
    });
}