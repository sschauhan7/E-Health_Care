
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>doctor_registration</title>
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
$d_id = $_POST['id'];
$d_f_name = $_POST['f_name'];
$d_l_name = $_POST['l_name'];
$d_email = $_POST['email'];   
$d_contact = ($_POST['contact']);
$d_specialist=($_POST['specialist']);
$d_qualification=($_POST['qualification']);


$d_DOB = $_POST['DOB'];
$d_age=$_POST['age'];
$d_gender = $_POST['gender'];
$d_address = $_POST['address'];
$d_bmdc_reg_num = $_POST['bmdc_reg_num'];
$d_pswd = $_POST['pswd'];
$d_pswd_len=strlen($d_pswd);
 
 $d_date = date("y/m/d") ;

  $_POST[".$d_date."];


   
	 if(empty($d_f_name))
	   {
	   $error_msg="Please Enter Your  First Name";
	   }
	   	 elseif(empty($d_l_name))
	   {
	   $error_msg="Please Enter Your  Last Name";
	   }
	    elseif(empty($d_email))
	   {
	   $error_msg="Please Enter Your Email Address";
	   }
	     elseif(!filter_var($d_email,FILTER_VALIDATE_EMAIL)){
	   $error_msg ="Please Enter A Valid Email Address";
	   }
	 
	    elseif(empty($d_contact))
	   {
	   $error_msg="Please Enter Your Contact Information";
	   }
	 /*     elseif(!filter_var($d_contact,FILTER_VALIDATE_INT)){
	   $error_msg ="please enter a valid number";
	   }*/
	   elseif(empty($d_specialist))
	   {
	   $error_msg="Please Enter Your Specialism";
	   }
	    elseif(empty($d_qualification))
	   {
	   $error_msg="Please Enter Your Qualification Section";
	   }
	    elseif(empty($d_DOB))
	   {
	   $error_msg="Please Enter Your Date Of Birth(DOB)";
	   }
	    
	    
	    elseif(empty($d_gender))
	   {
	   $error_msg="Please Fill Up The Gender  ";
	   }
	    elseif(empty($d_bmdc_reg_num))
	   {
	   $error_msg="Please Provide Your BMDC Registration Number ";
	   }
	    elseif(!filter_var($d_bmdc_reg_num,FILTER_VALIDATE_INT)){
	  $error_msg ="Please Enter A Valid Number";
	  }
	   elseif(empty($d_pswd))
	   {
	   
	   $error_msg=" Please Enter Your Password";
	   }
	  elseif($d_pswd_len<=8)
	   {
	   $error_msg="Yuor Password Should Be More Than 8 Characters Long";
	   }
	   else
	   
	   { $d_query="INSERT INTO doctor(f_name,l_name,email,contact,specialist,qualification,DOB,gender,address,bmdc_reg_num,pswd,date,permission)     
	                            VALUES('$d_f_name','$d_l_name','$d_email','$d_contact','$d_specialist','$d_qualification','$d_DOB','$d_gender','$d_address','$d_bmdc_reg_num','$d_pswd','$d_date','Pending')" ;
								mysqli_query($db,$d_query);
							$run= $success_msg="Thank You For Registration And Wait For Admin's Approval";
				
					
				
							 }
	
	
}
	 
?>
<div class="text-center panel-body bg-success">
  <h1><stron>Registration</strong></h1> 
  <p><strong>Please fill in this form to create an account.</strong></p>
<form action = "doctor_registration.php" method="POST" class="form-inline">

 <div class="container-fluid text-center bg-grey col-50">
      <?php
include '../translate.php';
?>
      <hr><label for="f_name"><i class="fa fa-user"></i>  First Name :</label><br /><br /><input type="text" class="form-control" size="50"placeholder="Enter Your First Name" name="f_name"required><br /><br />
<label for="l_name"><i class="fa fa-user"></i>   Last Name:</label><br /><br /><input type="text"class="form-control" size="50"placeholder="Enter Your Last Name" name="l_name"required><br /><br />
<label for="email"><b>Email Address:</b></label><br /><br /><input type="email" placeholder="Enter Your Email Address"class="form-control" size="50" name="email"required><br /><br />

<label for="contact"><b>Contact Number:</b></label><br /><br /><input type="contact"class="form-control" size="50" placeholder="Enter Your Contact Number"name="contact" pattern="[0-9]{10}" required><br /><br />
<label for="specialist"><b>Specialist:</b></label><br /><br /><select name="specialist"required>
  <option value="Orthopedic"required>Orthopedic</option>
  <option value="gynecologist"required>Gynecologist</option>
  <option value="dentist"required>Dentist</option>
  <option value= "medicine"required>Medicine</option>
  <option value="cardiologist"required>Cardiologist </option>
   <option value= "cardiac_electrophysiologist"required> Cardiac electrophysiologist</option>
  <option value="Surgeon"required>Surgeon </option></select> <br /><br />
 

<label for="qualification"><b>Qualification:</b></label><br /><br /><input type="text"placeholder="Enter Your Designation"class="form-control" size="50" name="qualification"required><br /><br /> 
<label for="DOB"><b>DOB:</b></label><br /><br /><input type="date"class="form-control" size="50" name="DOB"required><br /><br />

<label for="gender"><b>Gender:</b></label><br /><br /><input type="radio" name="gender" value="male"required>Male
                                         <br /><br /><input type="radio" name="gender" value="female"required>Female<br /><br />
<label for="DOB"><b>Hospitals/Clinic Address:</b></label><br /><br /><input type="address"class="form-control" size="50" name="address" placeholder="Enter Clinic/Hospital Address"required><br /><br />
<label for="bmdc_reg_num"><b>BMDC Registration Number:</b></label><br /><br /><input type="bmdc_reg_num"class="form-control" size="50" name="bmdc_reg_num" placeholder="Enter Your Registration Number"required><p><strong>Only input Numeric Number, Without A-( like 1,2,3 ).</strong></p><br /><br />
<label for="pswd"><i class="fa fa-key icon"></i>  Create New Password  :</label><br /><br /><input type = "password" class="form-control" size="50"placeholder="Create Your Password"name="pswd"required><p><strong>password should be more than 8 characters long</strong></p>
           <input type ="submit" class="btn btn-danger text-uppercase focus" name="submit" value="register"> 
</div>
 <p> <strong> Already A Member? <a href="doctor_login.php">Login</a></strong></p>
<h2><a href="../index.php">Back</a></h2> </p>
 </div>

<?php
if(isset($error_msg)){echo $error_msg;}
if(isset($success_msg)){echo $success_msg;}
	
?>
	  <script>
					alert(wait  admin);
					</script>	
</form></div>
					
					
</body>
</html>