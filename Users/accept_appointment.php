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

<title>view_users_appointment</title>
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
           <h1 class="text-white shadow-lg">You Have a Notification</h1>
<table  border="1" cellPadding="13" align="center" 
class="table table-hover table-dark">

<thead>
<tr>



<?php
session_start();
include("connection.php");
include '../translate.php';


$email=$_SESSION['email'];

	$edit_doctor_profile_query="select schedule.s_id,doctor.f_name,doctor.l_name,appointment.booking_date,appointment.booking_time,appointment.permission from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where user.email='$email' and appointment.permission='Approved' ||user.email='$email' and appointment.permission='Canceled'";
	
	$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
 
				   while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				     {
					 ?>
                       <th>  <h3 class="text-center "> Your &nbsp;  Appointment &nbsp;   Has &nbsp;   Been &nbsp;   <?php echo $drow['permission']; ?> &nbsp;  By  &nbsp; <?php echo  "<a href='../Admin/detail.php?s_id={$drow['s_id']}'>{$drow['f_name']}{$drow['l_name']}</a>";?></h3></th></tr></thead>
                          <?php	
						  }
                          ?><br />
                          </table>
						 </body>
</html>
