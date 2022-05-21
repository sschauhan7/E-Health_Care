<style>
<?php

include '../style1.css';

?>

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>d_address</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
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
<?php
session_start();
include("connection.php");
include 'translate.php';

if(isset($_POST['submit4'])){
$d_email= $_SESSION['email'];
$d_id=$_POST['id'];
$d_address=$_POST['address'];
$select_d_address_query="select email from doctor   where email='$d_email' ";
	$run_d_address_query=mysqli_query($db,$select_d_address_query);
	
	if(mysqli_num_rows($run_d_address_query)>0)
	{
	$check_drow= mysqli_fetch_assoc($run_d_address_query);
	
	$edit_d_address_query="update doctor set email='$d_email'  where email='$d_email' ";
	
	
	$edit_run_d_address_query=mysqli_query($db,$edit_d_address_query);
	if(isset($edit_run_d_address_query))
	{
	$update_msg="updated ";
		echo"	<script> alert ('Are You Sure ? You Want To Change Your Address')</script> ";
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
 <form action = "d_email.php" method="POST">
   

   change email:    <input type="text" name="email"><input type ="submit" name="submit4" value="save"><br /> 
    	
		
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form>
</body>
</html>
