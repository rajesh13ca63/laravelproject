$(document).ready(function () {
    $("#users").change(function () {
    alert($(this).val());    
    document.getElementById("loc").innerHTML="You selected: "
    +document.getElementById("users").value;  
    });  
});
