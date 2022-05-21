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
           <h1 class="text-white shadow-lg">All The Appointments</h1>
<form class="text-center text-capitalize font-weight-bold"  action = "view_users_appointment.php" method="POST">
<table  border="1" cellPadding="13" align="center" 
class="table table-hover table-dark">

<thead>
<tr>


<th><h3> Appointment To</h3></th>
<th><h3> Appointment Date</h3></th>
<th><h3>Appointment Time</h3></th>
<th><h3>Status</h3></th>
<th><h3><input class="alert-danger"type ="submit" value="Cancel Booking" name="submit1"></h3></th>

</tr></thead>
<?php
session_start();
include("connection.php");



$email=$_SESSION['email'];

	$doctor_sid_show_squery="select * from  user   where email='$email'" ;
	
	$doctor_sid_squery=mysqli_query($db,$doctor_sid_show_squery);
 
				   while($d_s_row = mysqli_fetch_array($doctor_sid_squery))
				   {
				   ?>
                  <h3 class="active font-weight-bold text-warning"> Enter Your ID :  <?php
echo $d_s_row['id'];  echo "  " ;		         
 }   ?> &nbsp;<input class="text-center text-dark" type = "id" name="id"  placeholder=" Enter Your ID "/></h3><hr> 

<?php
session_start();



$email=$_SESSION['email'];
if(isset($_REQUEST["submit1"]))
				   {
				   $sid=$_POST['sid'];
				   $check=$_REQUEST["check"];
				   $save=implode(",",$check);
				$sid=$_GET['sid'];
//$d_email = $_SESSION['email'];
$pid=$_POST['sid'];
$choose_doctor_schedule_query="select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where user.email='$email'";
	$run_doctor_schedule_query=mysqli_query($db,$choose_doctor_schedule_query);
	

	if(mysqli_num_rows($run_doctor_schedule_query)>0)
	{
	$check_drow= mysqli_fetch_assoc($run_doctor_schedule_query);

	$update_doctor_schedule_query="update  doctor inner join schedule on schedule.d_id=doctor.id inner join appointment on appointment.sid=schedule.s_id  inner join user on appointment.pid=user.id 
							 set appointment.permission='Deleted' 
							
							 where sid in ($save) and user.email='$email' ";
							    
	
	
	$run_update_doctor_schedule_query=mysqli_query($db,$update_doctor_schedule_query);
	if(isset($run_update_doctor_schedule_query))
	{
	$update_msg="Successfully Deleted";
		echo"	<script> alert (' Successfully Deleted')</script> ";
	
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
<?php
	$edit_doctor_profile_query="select schedule.s_id,doctor.f_name,doctor.l_name,appointment.booking_date,appointment.booking_time,appointment.permission,appointment.sid as asid from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where user.email='$email' and appointment.permission='Approved' or  user.email='$email' and appointment.permission='Pending'";
	
	$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
 
				   while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				     {
                        ?>
                        <tr>
                      
                         
					       <th><h3><?php echo  "<a href='../Admin/detail.php?s_id={$drow['s_id']}'>{$drow['f_name']}{$drow['l_name']}</a>";?></h3></th>
                           <th><h3><?php echo $drow['booking_date'];  	?></h3></th>
                        
                           <th><h3><?php echo $drow['booking_time'];  	?></h3></th>
                           <th><h3><?php echo $drow['permission'];  	?></h3></th>
                           <th><input type ="checkbox" name ="check[] "value="<?php echo $drow['asid']?> "> </th>
                        
                            </tr>
                        <?php    
 }  
				
				 
?>

	</table>
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form>
   <div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="view_user_home_page.php">Previous</a></li>
  <li class="next"><a href="accept_appointment.php">Next</a></li>
</ul></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
