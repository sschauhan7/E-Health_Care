
<style>
<?php

include '../style.css';

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
<h1>Appointment</h1>
<?php
include 'connection.php';

include 'translate.php';
?>
<?php
$sql="select * from doctorschedule where bookAvail='Available' ; " ;
	
	$result=mysqli_query($db,$sql);
	$resultCheck = mysqli_num_rows($result);
  if($resultCheck > 0){
				   while($row = mysqli_fetch_assoc($result))
				   {
				          
 echo"	 schedule ID : "; echo $row['scheduleId']  ;				

echo" 	Date :  ";   echo $row['scheduleDate']; 
echo" 	schedule Day :  ";  echo $row['scheduleDAY'] ; 
echo"	 start time :  "; 		   echo $row['startTime'] ;

echo" 	end time :  "; 		   echo $row['endTime'] ;
echo" 	Available :  "; 		   echo $row['bookAvail'] ."<br>" ;
					   }
 }

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
	   $error_msg="Please Enter ... Yes or No .... ?? ";
	   }
	    else
	   
	   { $u_query="INSERT INTO schedule(schedule_id,schedule_date,schedule_day,start_time,end_time,booking)     
	                            VALUES('$schedule_id','$schedule_date','$schedule_day','$start_time','$end_time','$booking')" ;
								mysqli_query($db,$u_query);
							$run= $success_msg="Your appointment time and date are updateted";
						
				
							 }
	
	
}
?>

 <form action = "user_appointment.php" method="POST">
<ul>


<li> Schedule ID             <br /><br /><input type="id" name="schedule_id"><br /><br /> </li>
<li> Schedule Date         <br /><br /><input type="date" name="schedule_date"><br /><br /> </li>
<li> Schedule Day     <br /><br /><input type="radio" name ="schedule_day1" value="sunday">Sunday
					<br /><br /><input type="radio"  name= "schedule_day2" value="monday">Monday
                    <br /><br /><input type="radio"  name= "schedule_day3" value="monday">Tuesday
                    <br /><br /><input type="radio"  name= "schedule_day4" value="monday">Wednesday
                    <br /><br /><input type="radio"  name= "schedule_day5" value="monday">Thursday
                    <br /><br /><input type="radio"  name= "schedule_day6" value="monday">Friday
                    <br /><br /><input type="radio"  name= "schedule_day7" value="monday">Saturday<br /><br /></li>
                    
<li><i class="material-icons"></i>		Start time        <br /><br /><input type="time" name="start_time">  <br /><br /> </li>

<li><i class="material-icons"></i>		End time      <br /><br /><input type="time" name="end_time">  <br /><br /></li>

<li> Booking:        <br /><br /><input type="radio" name="booking" value="Availeable">Yes
               <br /><br /><input type="radio" name="booking" value="Not_Availeable">No<br /><br /></li>

                     <br /><br />    <input type ="submit" name="submit" value="submit"> <br /><br />  
                     </ul>
<?php
if(isset($error_msg)){echo $error_msg;}
if(isset($success_msg)){echo $success_msg;}

?>
<?php

$res1 = mysqli_query($db,"SELECT * FROM doctorschedule  INNER JOIN schedule
WHERE doctorschedule.scheduleId=schedule.schedule_id");
	$result=mysqli_query($db,$res1);
	$resultCheck = mysqli_num_rows($result);
  if($resultCheck > 0){
				   while($row = mysqli_fetch_assoc($result))
				   {
				  //INSERT
if (isset($_POST['appointment'])) {
$patientIc = mysqli_real_escape_string($db,$userRow['icPatient']);
$scheduleid = mysqli_real_escape_string($db,$appid);
$symptom = mysqli_real_escape_string($db,$_POST['symptom']);
$comment = mysqli_real_escape_string($db,$_POST['comment']);
$avail = "notavail";
$query = "INSERT INTO appointment (  patientIc , scheduleId , appSymptom , appComment  )
VALUES ( '$patientIc', '$scheduleid', '$symptom', '$comment') ";
//update table appointment schedule
$sql = "UPDATE doctorschedule SET bookAvail = '$avail' WHERE scheduleId = $scheduleid" ;
$scheduleres=mysqli_query($db,$sql);
if ($scheduleres) {
	$btn= "disable";
} 
$result = mysqli_query($db,$query);
				   }
				   }
				   }
?>
</form>

<h2><a target="_blank" href="view_user_home_page.php">Back</a></h2> </p>
</body>
</html>
