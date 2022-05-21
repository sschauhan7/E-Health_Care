<style>
<?php

include '../style1.css';

?>

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>d_pswd</title>
</head>


<style>
h1{
font-size:50px;
padding-left:590px;
padding-top:60px;
}
img 
{ float: left;
width: 77px;
}

body {margin:0;
padding:0;
font-family:"Bahnschrift Light", "Bernard MT Condensed", "Berlin Sans FB Demi", "Bell MT";
width:100%;
height:100vh;
background-image:url(../pic/healthcare-banner.jpg);
background-size:cover;
}
</style>
<body>

 <h1>Changing Password</h1>
<?php
session_start();
include("connection.php");



if(isset($_POST['submit5'])){
$d_email = $_SESSION['email'];
$d_pswd=$_POST['pswd'];
$d_pswd_len=strlen($d_pswd);
$select_d_pswd_query="select pswd from doctor  where email='$d_email'";
	$run_d_pswd_query=mysqli_query($db,$select_d_pswd_query);
	
	if(mysqli_num_rows($run_d_pswd_query)>0)
	{
	$check_drow= mysqli_fetch_assoc($run_d_pswd_query);

	$edit_d_pswd_query="update doctor set pswd='$d_pswd'  where email='$d_email'";
	
	
	$edit_run_d_pswd_query=mysqli_query($db,$edit_d_pswd_query);
	if(isset($edit_run_d_pswd_query))
	{
	$update_msg="updated ";
		echo"	<script> alert ('Are You Sure ? You Want To Change Your Password')</script> ";
	echo "<script> window.location='view_doctor_profile.php' </script>";
	}
	else
	{
	$error_msg="not updated";
	}

	
	}
		else
	{
	$error_msg="user not found";
	}
}
?>
<ul class="text-center font-weight-bold text-monospace text-dark"><form class=" text-center text-xl-info font-weight-bold" action = "d_pswd.php" method="POST">
   
  Change Password  : <input type = "password" name="pswd"/>   password should be more than 8 characters long 
    	                                <input type ="submit" name="submit5" value="save"> <br /><br />  
		
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form></ul>
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="doctor_home_page.php">Previous</a></li>
  <li class="next"><a href="doctor_home_page.php">Next</a></li>
</ul></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
