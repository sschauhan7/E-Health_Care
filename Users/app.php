<style>
<?php
include '../style1.css' ;

?>
</style><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title >appointment_details</title>
</head>
<style>
h1{
font-size:50px;
padding-top:50px;
text-align:center;
}
h2{
font-size:40px;
padding-top:50px;
text-align:center;
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
background-image:url(healthcare-banner.jpg);
background-size:cover;
}
</style>
<body>

<h1 class="card-title text-center text-monospace">Appointment Schedule</h1>
<?php 
 include("connection.php");
   session_start();
$id = $_SESSION['id'];
  if(isset($_POST['submit'])){
		
$booking_date=$_POST['booking_date'];
$booking_time=$_POST['booking_time'];
 $app_permission=$_POST['permission'];
$app_date = date("y/m/d") ;

  $_POST[".$app_date."];
 $p_id=$_POST['pid'];
 $schedule_id=$_POST['sid'];
 
   if(empty($booking_date))
	   {
	   $error_msg="Please Enter Your Date";
	   }
	    
	 
	    elseif(empty($booking_time))
	   {
	   $error_msg="Please Enter Booking Time";
	   }
  elseif(empty($p_id))
	   {
	   $error_msg="Please Enter Your id";
	   }
	   
elseif(empty($schedule_id))
{
$error_msg=" Id";
}
 
	   else
	   
	   { $u_query="INSERT INTO appointment(app_id, booking_date, booking_time, permission, date, pid, sid) 
	   VALUES ('$app_id','$booking_date','$booking_time','$app_permission','$app_date','$p_id','$schedule_id')";
								mysqli_query($db,$u_query);
							echo"	<script> alert ('Your Appointment Updated !Wait for the Approval')</script> ";
							 }
	
	
}
	 
?>
                  
 
            
            <h2 class="card-title text-monospace">Book Date And Time</h2>
     <form class=" text-center text-xl-info font-weight-bold" action = "app.php" method="POST">
 
   <label for="pid"><b>pid:</b></label><br /><br /><input type="pid" name="pid"required><br /><br />  
     <label for="sid"><b>sid:</b></label><br /><br /><input type="sid" name="sid"required><br /><br />
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
 
	  <br /><br />  <button class="btn"><i class="fa fa-download fa-2x "></i>  <input type ="submit" name="submit" value="Submit"> </button><br /><br />  
	
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form>  


<h2 text-xl-info font-weight-bold><a target="_blank" href="doctor_home_page.php">Back</a></h2> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>
</html>
