
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>registration</title>
</head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>registration</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'><style>
<style>
   .jumbotron {
      background-color: #f4511e;
      color:#666666;
      padding: 100px 25px;
  }.container-fluid {
      padding: 60px 50px;
  } 
.bg-success{
background-color:#ccccc;
   color:black;
      padding: 100px 25px;

}.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
  padding: 0 16px;
}
   .bg-grey {
      background-color:#EEEEEE;
  
  }.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
</style>
 
<?php 
include("connection.php");

if(isset($_POST["submit"])){

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];   
$contact = ($_POST['contact']);
$address = $_POST['address'];
$DOB = $_POST['DOB'];
$age=$_POST['age'];
$gender = $_POST['gender'];
$maritialstatus=$_POST['maritialstatus'];
$pswd = $_POST['pswd'];
$pswd_len=strlen($pswd);
 $d_date = date("y/m/d") ;

  $_POST[".$d_date."];


   
	 if(empty($f_name))
	   {
	   $error_msg="Please Enter Your  First Name";
	   }
	   	 elseif(empty($l_name))
	   {
	   $error_msg="Please Enter Your  Last Name";
	   }
	    elseif(empty($email))
	   {
	   $error_msg="Please Enter Your Email Address";
	   }
	    
	 
	    elseif(empty($contact))
	   {
	   $error_msg="Please Enter Your Contact Information";
	   }
	 /*     elseif(!filter_var($d_contact,FILTER_VALIDATE_INT)){
	   $error_msg ="please enter a valid number";
	   }*/
	  
	    
	   
	    
	    
	    elseif(empty($gender))
	   {
	   $error_msg="Please Fill Up The Gender  ";
	   }
	  
	   elseif(empty($pswd))
	   {
	   
	   $error_msg=" Please Enter Your Password";
	   }
	  elseif($pswd_len<=8)
	   {
	   $error_msg="Yuor Password Should Be More Than 8 Characters Long";
	   }
	   else
	   
	   { $d_query="INSERT INTO user(f_name,l_name,email,contact,address,DOB,gender,pswd,date)     
	                            VALUES('$f_name','$l_name','$email','$contact','$address','$DOB','$gender','$pswd','$date')" ;
								mysqli_query($db,$d_query);
							$run= $success_msg="Thank You For Registration";
				
					 echo "<script> window.location='login.php' </script> ";
				
							 }
	
	
}
	 
?>



 <div class="container-fluid text-center bg-grey col-50">
   <form action = "registration.php" method="POST" class="form-inline">
<div class="container">
<h1>Registration</h1><p>Please fill in this form to create an account.</p>
      <hr>

<label for="f_name" style="font-size:16px"><i class="fa fa-user"></i>   First Name: *</label><br /><br /><input type="text"placeholder="Enter Your First Name" name="f_name"required><br /><br />
<label for="l_name"style="font-size:16px"><i class="fa fa-user"></i>   Last Name: *</label><br /><br /><input type="text"  placeholder="Enter Your Last Name"name="l_name"required><br /><br />
<label for="email"style="font-size:16px"><i class="fa fa-envelope"></i>   Email Address: *</label>
<br /><br />
<input type="text"style="font-size:16px" placeholder="Enter Your Email Address"name="email"required><br /><br />
<label for="contact"style="font-size:16px"><i class="fa fa-address-card-o"></i>   Contact Number: *</label>
<br /><br />
<input type="contact"style="font-size:16px" placeholder="Enter Your Contact Number"name="contact"  required><br /><br />
<b style="font-size:16px">Address:</b></label>
<br /><br /><hr>
<textarea style="font-size:16px" placeholder="Enter Your Address"name="address"></textarea><br /><br />
<label for="DOB"style="font-size:16px"><b>DOB: *</b></label><br /><br /><input type="date" name="DOB"required><br /><br />

<label for="gender"style="font-size:16px"><i class="fa fa-user"></i>   Gender: *</label><br /><br /><input type="radio" name="gender"requiredstyle="font-size:16px" value="male"><b style="font-size:16px">Male</b>
                          <br /><br /><input type="radio" name="gender"required value="female"><b style="font-size:16px">Female</b><br /><br />
<b style="font-size:16px">Maritial Status:</b></label><br /><br /><input style="font-size:16px"type="radio" name="maritialstatus"style="font-size:16px" value="married"><b style="font-size:16px">Married</b>
                                           <br /><br /><input type="radio" name="maritialstatus"style="font-size:16px"  value="single"><b style="font-size:16px">Single</b><br /><br /><hr >
<label for="pswd" style="font-size:16px"><i class="fa fa-key icon"></i>  Create New Password: *</label><br /><br /><input type = "password"placeholder="Create Your password" name="pswd"required>  <p style="font-size:16px"> password should be more than 8 characters long </p>
           <input type ="submit" class="btn btn-danger text-uppercase focus" name="submit" value="register"> 
</div>
 <p> <strong> Already A Member? <a href="login.php">Login</a></strong></p>
<h2><a href="../index.php">Back</a></h2> </p>
 </div>

<?php
if(isset($error_msg)){echo $error_msg;}
if(isset($success_msg)){echo $success_msg;}
	
?>
	 
</form></div>
					
					
</body>
</html>