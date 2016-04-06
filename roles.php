<?php
require 'dbinfo.php';
require 'admin.php';

$addrole = $_POST['addrole'];
$delrole = $_POST['rolename'];
$addrsrc = $_POST['addresource'];

//Adding new role into the database
if ($_POST['submit'] == "Add") {
        $sql = "INSERT INTO roles (role_name)
                 VALUES ('$addrole') ";
        $result=mysqli_query($conn, $sql);
}

//Adding new Resources into the database
if ($_POST['submit1'] == "Add") {
        $sql = "INSERT INTO resource (resource_name)
                VALUES ('$addrsrc') ";
        $result=mysqli_query($conn, $sql);
}

if ($_POST['submit'] == "Delete") {
    $sql = "DELETE 
            FROM roles 
            WHERE role_name = $delrole ";

    $result = mysqli_query($conn,$sql);
}

?>
<!--HTML Code for Loginpage-->
<div class="container">
   <h1 class="well" align="center">Adminstration Page</h1>
   <!--Role Adddition and Deletion-->
     <div class="jumbotron">
        <form role="form" name="f" method="post" action="roles.php">
            <h3>Role Description </h3><br>
            <div class="row">
                <div class="col-sm-4 col-sm form-group">                                 
                     <div>
                         <label>Add New Role</label>
                         <input type="text" name="addrole"  id="addrole">
                     </div>
                </div>
                <div class="col-sm-3 from-group">
                    <?php
                    
                    $sql = "SELECT id, role_name FROM roles";
                    $result = mysqli_query($conn, $sql);
                    
                    echo "<select name='role_name' id='rolename' >";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] ."'>" . $row['role_name'] ."</option>";
                    }

                    echo "</select>"

                    ?>
                  
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Delete"> 
                </div>
            </div>
               <!--Add new Resources here-->
               
            <div class="row">
                <h3>Resource Description </h3><br>
                <div class="col-sm-4 col-sm form-group">                                 
                     <div>
                         <label>Add New Resource</label>
                         <input type="text" name="addresource"  id="addresource">
                     </div>
                </div>
                <div class="col-sm-3 from-group">
                    <?php
                    $sql = "SELECT id, resource_name 
                            FROM resource";
                    $result = mysqli_query($conn, $sql);
                    echo "<select name='resource_name' id='rsrc' >";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] ."'>" . $row['resource_name'] ."</option>";
                    }

                    echo "</select>"
                    ?>
              
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn btn-primary" name="submit1" id="submit" value="Add">
                    <input type="submit" class="btn btn-primary" name="submit1" id="submit" value="Delete"> 
                </div>
            </div>
        </form>
      
        
    </div>
</div>