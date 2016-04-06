<?php
require 'header.html';
require 'dbinfo.php';
//require 'validation.php';
?>
<?php
session_start();
if (!isset($_SESSION['username']))
 header("location:login1.php");

 //udating  databases
$username = $_SESSION['username'];
$query = "SELECT * from registration where username = '$username'";
$resource = mysqli_query($conn,$query);
$profile = mysqli_fetch_assoc($resource); 

  
if ($_POST['submit'] == "save") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $firstname = $_POST['firstname'];
  $midname = $_POST['midname'];
  $lastname = $_POST['lastname'];
  $sex = $_POST['sex'];
  $marital = $_POST['marital'];
  $dob = $_POST['dob'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $offstreet = $_POST['offstreet'];
  $offcity = $_POST['offcity'];
  $offstate = $_POST['offstate'];
  $offzip = $_POST['offzip'];
  $offphone = $_POST['offphone'];
  $offemail = $_POST['offemail'];
  $website = $_POST['website'];

            //uploading image file to the server and its validation. 
            if ($_FILES['image']['name']) {
                $imgvar = basename($_FILES['image']['name']);
                $imagetype = pathinfo($imgvar, PATHINFO_EXTENSION);
                
            if ($imagetype != "jpg" && $imagetype!="jpeg" && $imagetype!="png" && $imagetype!="gif") {
                $error['image'] = "Invalid <b>image</b> type";
            }else {
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/phpproject/new/$imgvar");
            }

            }else {
                $query = "SELECT image from registration where username='{$_SESSION['username']}'";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_assoc($result);
                $imgvar = $row['image'];
            }       

//upadating the database by user                                                                                                       
  $sql = "UPDATE registration
  SET username = '$username',
  password = '$password',
  repassword = '$repassword',
  firstname = '$firstname',
  midname = '$midname',
  lastname = '$lastname',
  sex = '$sex',
  marital = '$marital',
  dob = '$dob',
  street = '$street',
  city = '$city',
  state = '$state',
  zip = '$zip',
  phone = '$phone',
  email = '$email',
  offstreet = '$offstreet',
  offcity = '$offcity',
  offstate = '$offstate',
  offzip = '$offzip',
  offphone = '$offphone',
  offemail = '$offemail',
  image = '$imgvar',
  website = '$website'  where username = '$username' ";


          if (mysqli_query($conn, $sql)) {
              echo "Record updated successfully";
              header("location:home.php");
          }else {
              echo "Error updating record: " . mysqli_error($conn);
           }
          }
?>       
<!--HTML code for  upadating form-->
<div class="container">
    <h1 class="well" align="center">Registration Form</h1>
    <div class="col-lg-12 well">
        <form name="form" method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()" >
           <!--HTML Code for UserId and Password-->
          <div class="row">
              <div class = "col-sm-4 form-group">
                <label>1.User Name</label>
                <input type="text" name="username" id="username" value="<?php echo $profile['username'] ?>" class="form-control">
                <div id="user"></div>
              </div>
              <div class = "col-sm-4 form-group">
                <label>2.Password</label>
                <input type="password" name="password" id="password" value="<?php echo $profile['password'] ?>" class="form-control"></p></br>
              </div>                         
              <div class="col-sm-4 form-group">
                <label>3.Retype Password</label>
                <input type="password" name="repassword" id="repassword" value="<?php echo $profile['repassword'] ?>"  class="form-control">
              </div>
          </div>
  <!--HTML Code for Personal Information-->
          <div class="row">
              <div class="col-sm-4 form-group">
                <label>4.First Name</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $profile['firstname'] ?>"  class="form-control">
              </div>
              <div class="col-sm-4 form-group">
                <label>5.Middle Name</label>
                <input type="text" name="midname" id="midname" value="<?php echo $profile['midname'] ?>"  class="form-control"></p></br>
              </div>                         
              <div class="col-sm-4 form-group">
                <label>6.Last Name</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $profile['lastname'] ?>"  class="form-control">
              </div>
          </div>
<!--HTML Code For gender marital status and dob-->
  <div class="row">
       <div class="col-sm-4 form-group">
          <label>7.Gender</label>                           
        <div class="radio">
          <label><input type="radio" name="sex" id="sex" value="<?php echo $profile['sex'] ?>" >Male</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sex" id="sex" value="<?php echo $profile['sex'] ?>">Female</label>
        </div>
      </div>
      <div class="col-sm-4 form-group">
         <label>8.Marital Status</label>                           
         <div class="radio">
           <label><input type="radio" name="marital" id="marital" value="<?php echo $profile['marital'] ?>">Maried</label>
         </div>
         <div class = "radio">
           <label><input type="radio" name="marital" id="marital" value="<?php echo $profile['marital'] ?>">Unmaried</label>
         </div>
      </div>
      <div class="col-sm-4 form-group">
         <label>9.Date of Birth</label>
         <input type="date" name="dob" id="dob" value="<?php echo $profile['dob'] ?>" >
      </div>
  </div>
      <!--HTML Code for Residence Address -->
          <div class="row">
             <div class="col-sm-6 form-group">
                <h3><label>Residence Address</label></h3><br>
                <label>Street</label>
                <input type="text" name="street" id="street" value="<?php echo $profile['street'] ?>"  class="form-control">
                  
                <label>City</label>
                <input type="text" name="city" id="city" value="<?php echo $profile['city'] ?>" class="form-control">
                            
                <label>State</label>
                <input type="text" name="state" id="state" value="<?php echo $profile['state'] ?>" class="form-control">
                
                <label>Zip Code</label>
                <input type="text" name="zip" id="zip" value="<?php echo $profile['zip'] ?>"  class="form-control">
                                
                <label>Phone Number</label>
                <input type="text" name="phone" id="phone" value="<?php echo $profile['phone'] ?>" class="form-control">
            
                <label>Email Address</label>
                <input type="text" name="email" id="email" value="<?php echo $profile['email'] ?>"  class="form-control">
            </div>    
                
        <!--HTML Code for Office Address-->
            <div class="col-sm-6 form-group">
                <h3><label>Office Address</label></h3><br>
                <label>Street</label>
                <input type="text" name="offstreet" id="offstate" value="<?php echo $profile['offstreet'] ?>"  class="form-control">
                  
                <label>City</label>
                <input type="text" name="offcity" id="offcity" value="<?php echo $profile['offcity'] ?>"  class="form-control">
                            
                <label>State</label>
                <input type="text" name="offstate" id="offstate" value="<?php echo $profile['offstate'] ?>"  class="form-control">
                
                <label>Zip Code</label>
                <input type="text" name="offzip" id="offzip" value="<?php echo $profile['offzip'] ?>"  class="form-control">

                <label>Phone Number</label>
                <input type="text" name="offphone" id="offphone" value="<?php echo $profile['offphone'] ?>"  class="form-control">
            
                <label>Email Address</label>
                <input type="text" name="offemail" id="offemail" value="<?php echo $profile['offemail'] ?>"  class="form-control">
            </div>    
         </div>
      <!--HTML Code for image and website-->
            <div class="row">
              <div class = "col-sm-6 form-group">
                <label>Upload Image</label>
                <input type="file" name="image" id="fileChooser" value="<?php echo $profile['image'] ?>"  class="form-control">
              </div>
              <div class = "col-sm-6 form-group">             
                  <label>Website</label>
                  <input type = "text" name="website" value="<?php echo $profile['website'] ?>"  class="form-control">
              </div>
            </div>
<div>
     <button type="submit" class="btn btn-primary" name="submit" id="submit" value="save">Save</button>       
</div>
</form>
</div>
</div>


<?php
require 'footer.php';
?>