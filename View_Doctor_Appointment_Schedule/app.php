
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>acceptappointment</title>
</head>
<style>h1{
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
ul{
font-size:28px;
}
ul h3{
font-size:40px;
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
<body><h1 class=" text-center font-weight-bold text-monospace text-info">Accept Appointment</h1>
<ul class="text-center font-weight-bold text-monospace text-dark">              

	<?php 
	include("../connection.php");
session_start();
$email=$_SESSION['email'];
 if(isset($_POST["submit"])){
$email = $_SESSION['email'];
$d_id=$_POST['id'];

$booking_date=$_POST['booking_date'];
$booking_time=$_POST['booking_time'];

$date = date("y/m/d") ;

  $_POST[".$date."];
 $pid=$_POST['pid'];
$sid=$_POST['sid'];


	
	    if(empty($booking_date))
	   {
	   $error_msg="Select Date";
	   }
	   
	 
	    elseif(empty($booking_time))
	   {
	   $error_msg="Select Time";
	   }
	
	elseif(empty($pid))
	   {
	   $error_msg="Enter Your ID";
	   }
	   	 elseif(empty($sid))
	   {
	   $error_msg="Enter This Id";
	   }
	
	

	   
	  
	  
	
	   else
	   
	   { $d_query="INSERT INTO appointment(booking_date,booking_time,permission,date,pid,sid)     
	                            VALUES('$booking_date','$booking_time','Pending','$date','$pid','$sid')" ;
								mysqli_query($db,$d_query);
								$update_msg="updated ";
					echo"	<script> alert ('Your Scheduling Updated')</script> ";
					
				
							 }
	
	
}
	
								

?>
 <form class=" text-center text-xl-info font-weight-bold" action = "app.php" method="POST">
Enter Your ID :  <input type = "pid" name="pid"/> <br /><br />
 
   Enter This ID :
  <input type = "sid" name="sid"/> <br /><br />
  <label for="booking_date"><b>Select Date:</b></label><br /><br /><input type="date" name="booking_date"required><br /><br />


<label for="booking_time"><b>Select Time:</b></label><br /><br /><select name="booking_time"required>

  
  <option value="9:00  AM To 9:30 AM">  9:00 AM To 9:30 AM </option> 
   <option  value="9:30  AM To 10:00 AM"> 9:30 AM To 10:00 AM </option>
   <option value="10:00 AM To 10:30 AM">10:00 AM To 10:30 AM</option> 
   <option value="10:30 AM To 11:00 AM">10:30 AM To 11:00 AM</option> 
   <option value="11:00 AM To 11:30 AM">11:00 AM To 11:30 AM</option>  
  
      
   <option value="1:30 PM To 2:00 PM">1:30 PM To 2:00 PM  </option> 
   <option value="2:00 PM To 2:30 PM">2:00 PM To 2:30 PM </option>
   <option  value="2:30 PM To 3:30 PM">2:30 PM To 3:00 PM</option>
   <option value="3:00 PM To 3:30 PM">3:00 PM To 3:30 PM</option>
   <option value="3:30 PM To 4:00 PM">3:30 PM To 4:00 PM</option>
   
  
   <option value="6:00 PM To 6:30 PM">6:00 PM To 6:30 PM  </option> 
   <option value="6:30 PM To 7:00 PM">6:30 PM To 7:00 PM </option>
   <option value="7:00 PM To 7:30 PM">7:00 PM To 7:30 PM</option>
   <option value="7:30 PM To 8:00 PM">7:30 PM To 8:00 PM</option>
   <option value="8:00 PM To 8:30 PM">8:00 PM To 8:30 PM</option>
   <option value="8:30 PM To 9:00 PM">8:30 PM To 9:00 PM</option></select>
 
	  <br /><br />    <input type ="submit" name="submit" value="submit"> <br /><br />  
	
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>
</form></ul>
<div class="container ">
<ul class="pager font-weight-bold text-monospace text-center">
  <li class="previous "><a href="../Users/view_user_home_page.php">Previous</a></li>
</ul></div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      
                  