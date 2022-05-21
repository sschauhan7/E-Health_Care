
<style>
<?php

include '../style1.css';

?>
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>user_appointment</title>
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
<h1>Appointment Schedule</h1>
<?php 
include("connection.php");
include 'translate.php';

if(isset($_POST["submit"])){
$schedule_id = $_POST['schedule_id'];
$schedule_date = $_POST['schedule_date'];
$schedule_day = $_POST['schedule_day'];
$start_time = $_POST['start_time'];   
$end_time = ($_POST['end_time']);
$booking= ($_POST['booking']);

if(empty($schedule_id))
{
$error_msg="Please Enter Id";
}
   elseif(!filter_var($schedule_id,FILTER_VALIDATE_INT)){
	   $error_msg ="Please Enter A Valid Id";
	   }


	elseif(empty($schedule_date))
	   {
	   $error_msg="Please Enter Schedule Date";
	   }
	   	 elseif(empty($start_time))
	   {
	   $error_msg="Please Enter Start Time";
	   }
	    	 elseif(empty($end_time))
	   {
	   $error_msg="Please Enter end Time";
	   }
	    	 elseif(empty($booking))
	   {
	   $error_msg="Please Enter ... Are You available or not .... ?? ";
	   }
	    else
	   
	   { $u_query="INSERT INTO schedule(schedule_id,schedule_date,schedule_day,start_time,end_time,booking)     
	                            VALUES('$schedule_id','$schedule_date','$schedule_day','$start_time','$end_time','$booking')" ;
								mysqli_query($db,$u_query);
							$run= $success_msg="Your schedule time and date are updateted";
						
				// echo "<script> window.location='appointment.php' </script> ";
							 }
	
	
}
?>
<form class=" text-center text-xl-info font-weight-bold" action = "user_appointment.php" method="POST">


<ul>
<li> Schedule ID :<br /><br /><input type="id" name="schedule_id"><br /><br /> </li>
<li> Schedule Date:<br /><br /><input type="date" name="schedule_date"><br /><br /> </li>
<li> Schedule Day:<br /><br /><input type="radio" name ="schedule_day" value="sunday">Sunday
				  <br /><br /><input type="radio"  name= "schedule_day" value="monday">Monday<br /><br /></li>
                    
<li><i class="material-icons">watch</i>Start time:         <br /><br /><input type="time" name="start_time">  <br /><br /> </li>

<li><i class="material-icons">watch</i>End time:       <br /><br /><input type="time" name="end_time">  <br /><br /></li>

<li> Booking:        <br /><br /><input type="radio" name="booking" value="Availeable">Available
               <br /><br /><input type="radio" name="booking" value="Not_Availeable">Not Available<br /><br /></li>

                     <br /><br />    <input type ="submit" name="submit" value="submit"> <br /><br />  
  </ul>                  
<?php
if(isset($error_msg)){echo $error_msg;}
if(isset($success_msg)){echo $success_msg;}

?>

<h2><a target="_blank" href="doctor_home_page.php">Back</a></h2> </p>
</body>
</html>
