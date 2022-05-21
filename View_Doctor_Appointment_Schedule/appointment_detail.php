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
h1{
font-size:50px;
padding-top:30px;
}
li{
font-size:24px;
}
h3{
font-size:24px;
}
b{
font-size:24px;
color:#000000;
}
p{
text-align:center;
font-size:26px;}

body {margin:0;
padding:0;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
	background-attachment:fixed;
	background-image:url(../pic/Doctor_Time.jpg);
background-repeat:no-repeat;
background-size:cover;
}
</style>
<body class="container display-4">

                       
                        <!-- Grid -->
                  <div class="w3-row">

<div class="w3-col 18 s12">

  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container center-block">
                           
<h1 class="text-center font-weight-bold text-info ">Doctor's Schedule</h1><hr/>
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
	   
	   { 
       $d_query="INSERT INTO appointment(booking_date,booking_time,permission,date,pid,sid)     
	                            VALUES('$booking_date','$booking_time','Pending','$date','$pid','$sid')" ;
								mysqli_query($db,$d_query);
								$update_msg="updated ";
					echo"<script> alert ('Your Appointment Has Been Send Successfully! Wait For The Doctor's Approval')</script> ";
					
				
							 }
	
	
}
	
								

?>
<?php
 if(isset($_GET['s_id'])){
 error_reporting(0);
 $d_id=mysqli_query($db,$_GET['s_id']);
 	$show_doctor_profile_query="select * from doctor inner join schedule on schedule.d_id=doctor.id  WHERE s_id='$_GET[s_id]'" ;
	   $show_run_doctor_profile_query=mysqli_query($db,$show_doctor_profile_query);
	      $row = mysqli_fetch_array($show_run_doctor_profile_query);

				?>
                 <h1  class=" text-center font-weight-bold text-warning">Personal Information</h1> <hr color="#333333" />
                             <h3 class="text-white ">ID:    <?php  echo  $row['id'] . "<br />";?></br></h3> 
                             <h3 class="text-white"> Name:  <?php  echo   $row['f_name']; echo  $row['l_name']. "<br />";?></br></h3>
                             <h3 class="text-white">Email/Gmail Address:     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Contact Number:   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Clinic Address:   <?php  echo  $row['address'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Qualification:    <?php  echo  $row['qualification'] . "<br />";?></br></h3>
                             <h3 class="text-white"> BMDC Registration Number: <?php  echo  $row['bmdc_reg_num'] . "<br />";?></br></h3>
                              <h3 class="text-white"> Specialism:    <?php  echo  $row['specialist'] . "<br />". "<br />". "<br />";?></h3>
                            <h1 class=" text-center font-weight-bold  text-warning"> Visiting/Appointment Information</h1> <hr color="#333333" />
                          <p class="text-white  font-weight-bold">Schedule ID:    <?php  echo  $row['s_id'] . "<br />";?></p>
                                    <li>  <?php   echo $row['Day_Time1'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time2'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time3'] . "<br />";?></br></li>
                                     <li><?php   echo $row['Day_Time4'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time5'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time6'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time7'] . "<br />";?></br></br></li>
                                         </div>
      </div>
    </div>
  </div>
                           <?php        
   $email=$_SESSION['email'];

	$edit_doctor_profile_query="select * from user where email='$email'" ;
	
	$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
 
				   while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				   {
				  
				  ?>
              
                        <!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col 18 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container">
     <hr />
               <h1 class=" text-center font-weight-bold  text-warning">Booking Appointment</h1> <hr color="#333333" />
<form class=" text-center text-xl-info font-weight-bold" action = "appointment_detail.php" method="POST">
<h3>Enter Your ID :<?php  echo   $drow['id']; } ?></h3><br />  <b><input type = "pid" name="pid"/> </b><br /><br /><br />
 
  <h3> Enter This ID :<?php  echo   $row['s_id']; } ?></h3><br />
  <b><input type = "sid" name="sid"/></b> <br /><br /><br />
  <h3><label for="booking_date">Select Date:</label></h3><br /><b><input type="date" name="booking_date" ></b><br /><br /><br />


<h3><label for="booking_time">Select Time:</label></h3><br /><b><select name="booking_time"required>

  
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
   <option value="8:30 PM To 9:00 PM">8:30 PM To 9:00 PM</option></select></b></h3><br /><br />
 
	
	<button class="btn"><i class="fa  fa-2x "></i>  <input style="color:#000000" class="font-weight-bold"type ="submit" name="submit" value="submit"></i></button><br />
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>
</form>
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="center"><a href="../View_Doctor_Appointment_Schedule/doctor_schedule_list.php">Previous</a></li>
 
</ul></div></div>
</div>
</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


</body>
</html>