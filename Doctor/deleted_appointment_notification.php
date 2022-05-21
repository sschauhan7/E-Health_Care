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
include 'translate.php';


$d_email=$_SESSION['email'];

	$edit_doctor_profile_query="select schedule.s_id,user.f_name as fname,user.l_name as lname,user.id,doctor.f_name,doctor.l_name,appointment.booking_date,appointment.booking_time,appointment.permission from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where  doctor.email='$d_email' and appointment.permission='Deleted'";
	
	$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
 
				   while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				     {
					 ?>
                       <th>  <h3 class="text-center "> <?php echo "<a href='../Admin/user_detail.php?id={$drow['id']}'>{$drow['fname']}  {$drow['lname']}</a>";?> &nbsp; Has  &nbsp;
                       <?php echo $drow['permission']; ?>&nbsp; His/Her Appointment </h3></th></tr>
                          <?php	
						  }
                          ?><br>
                          </table>
						 </body>
</html>
