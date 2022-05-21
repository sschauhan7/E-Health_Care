<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Email</title>
</head>

<style>
h1{
font-size:50px;
text-align:center;
padding-top:30px;
color:#000066;
}
img 
{ float: left;
width: 77px;
}
li{
font-size:24px;
}
h3{
font-size:24px;
letter-spacing:4px;}
body {margin:0;
padding:0;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
width:100%;
height:100vh;
background-image:url(../pic/1.jpg);
background-size:cover;
}
</style>
<body class="container display-4">
<?php
session_start();
include("connection.php");
if(isset($_POST['submit2'])){
$email = $_SESSION['email'];
$email=$_POST['email'];
$select_email_query="select email from user where email='$email'";
	$run_email_query=mysqli_query($db,$select_email_query);
	
	if(mysqli_num_rows($run_email_query)>0)
	{
		
		$check_row= mysqli_fetch_assoc($run_email_query);
	
	$edit_email_query="update user set email='$email' where email='$email'";
	
	
	$edit_run_email_query=mysqli_query($db,$edit_email_query);
	if(isset($edit_run_email_query))
	{
	$update_msg="updated ";
		echo"	<script> alert ('Are You Sure ? You Want To Change Your Email Address')</script> ";
	echo "<script> window.location='profile.php' </script>";
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
include '../translate.php';
?>
  <!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col 18 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container">
                     <h1  class=" text-center font-weight-bold text-warning">Personal Profile</h1>
                        <hr color="#333333" />
<h3>
<form action = "u_email.php" method="POST">
   
     change email:    <input type="email" name="email"> <input type ="submit"style="color:#000000" name="submit2" value="save">  <br />
    	
			
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form></h3>
             
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="Center "><a href="view_user_home_page.php">Back To Profile</a></li>
</ul></div>
                 </div>
      </div>
    </div>
  </div>
</body>
</html>
