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

<title>doctor_schedule</title>
</head>
<style>

 body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
	background-attachment:fixed;
	background-image:url(../pic/Doctor_Time.jpg);
	background-size:cover;
}
  .container {
      padding: 5px 20px;
  }


   .container-fluid {
      padding: 5px 20px;
  } 

</style>

<body class="container  text-center">              
                        <!-- Grid -->
                  <div class="w3-row container">

<div class="w3-col 18 s12">

  <div class="w3-card-4 w3-margin w3-black">
    <div class=" container center-block">
<h1 class=" text-white text-center">Providing Appointment's Schedule</h1>
<?php




session_start();
include("connection.php");
include 'translate.php';


$d_email=$_SESSION['email'];
$edit_doctor_profile_query="select * from doctor where email='$d_email'" ;
	
	$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
 
				  
				 
				  ?>
                 
                  <?php
                  
                  
                

 if(isset($_REQUEST["submit"])){
 
				 
$d_email = $_SESSION['email'];
$d_id=$_POST['id'];

$d_Day_Time1=$_REQUEST['Day_Time1'];
  $sat=implode($d_Day_Time1);

$d_Day_Time2=$_REQUEST['Day_Time2'];
$sun=implode($d_Day_Time2);

$d_Day_Time3=$_REQUEST['Day_Time3'];
$mon=implode($d_Day_Time3);

$d_Day_Time4=$_REQUEST['Day_Time4'];
$tues=implode($d_Day_Time4);

$d_Day_Time5=$_REQUEST['Day_Time5'];
$wed=implode($d_Day_Time5);

$d_Day_Time6=$_REQUEST['Day_Time6'];
$thus=implode($d_Day_Time6);

$d_Day_Time7=$_REQUEST['Day_Time7'];
$fri=implode($d_Day_Time7);

$d_d_id=$_POST['d_id'];
$d_date = date("y/m/d") ;

  $_POST[".$d_date."];
 


	
	   
	    $d_query="INSERT INTO schedule(Day_Time1,Day_Time2,Day_Time3,Day_Time4,Day_Time5,Day_Time6,Day_Time7,d_id)     
	                            VALUES('$sat','$sun','$mon','$tues','$wed','$thus','$fri','$d_d_id')" ;
								mysqli_query($db,$d_query);
								$update_msg="updated ";
					echo"	<script> alert ('Your Scheduling Updated')</script> ";
					
				
							 
	
	
}
	
								

?>
<div class="w3-row">

<div class="w3-col 18 s12">
  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container">
                    
 <form class=" text-center text-xl-info font-weight-bold" action = "doctor_schedule.php" method="POST">
Enter ID From Your Profile  :	         
  <br /><br />
<input style="color:#000000" type = "d_id" name="d_id"/> <br /><br />
               <b>Select Day & Time:</b><br />
        
 <input type ="checkbox" name ="Day_Time1[]"  value="Saturday 9:00 AM To 9:00 PM">  Saturday  9:00 AM To 9:00 PM<br />
 
 

<input type ="checkbox" name ="Day_Time2[] " value="Sunday 9:00 AM To 9:00 PM">   Sunday        9:00 AM To 9:00 PM<br />
 

<input type ="checkbox" name ="Day_Time3[]"  value="Monday 9:00 AM To 9:00 PM">    Monday        9:00 AM To 9:00 PM<br />
 
 
  
<input type ="checkbox" name ="Day_Time4[] " value="Tuesday 9:00 AM To 9:00 PM">  Tuesday       9:00 AM To 9:00 PM<br />
 
 

<input type ="checkbox" name ="Day_Time5[] " value="Wednesday 9:00 AM To 9:00 PM">Wednesday     9:00 AM To 9:00 PM<br />
 


<input type ="checkbox" name ="Day_Time6[]"  value="Thursday 9:00 AM To 9:00 PM"> Thursday       9:00 AM To 9:00 PM<br />
 


<input type ="checkbox" name ="Day_Time7[] " value="Friday 9:00 AM To 9:00 PM">  Friday         9:00 AM To 9:00 PM<br />


  <br /><button class="btn"><i class=""></i> <input class="text-xl-info font-weight-bold" type ="submit" name="submit" value="Submit"></i></button>  <br />
	
                
     <?php               


?>

</form></ul>
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="../Admin/notification.php">Previous</a></li>
  
</ul></div>
</div>
</div>
</div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>
</html>
