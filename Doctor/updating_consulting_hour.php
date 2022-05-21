<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<title>doctor_appointment_schedule_updating</title>
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

<body class="container text-center">              
                        <!-- Grid -->
                  <div class="w3-row container">

<div class="w3-col 18 s12">

  <div class="w3-card-4 w3-margin w3-black">
    <div class=" container center-block">
<h1 class=" text-white text-center">Updating Schedule</h1>
<?php
session_start();
include("connection.php");
include '../translate.php';
$d_email=$_SESSION['email'];
$edit_doctor_profile_query="select * from doctor where email='$d_email'" ;
	
	$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
 
				   while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				   {
				?>
			
			
						<?php	 
				  
if(isset($_POST['submit'])){
$d_email = $_SESSION['email'];
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
$choose_doctor_schedule_query="select* from schedule  ";
	$run_doctor_schedule_query=mysqli_query($db,$choose_doctor_schedule_query);
	
	if(mysqli_num_rows($run_doctor_schedule_query)>0)
	{
	$check_drow= mysqli_fetch_assoc($run_doctor_schedule_query);

	$update_doctor_schedule_query="update consulting_schedule set 
	                          Day_Time1='$sat',
							  Day_Time2='$sun' ,
							  Day_Time3='$mon' ,
							  Day_Time4='$tues' ,
							  Day_Time5='$wed' ,
							  Day_Time6='$thus' ,
							  Day_Time7='$fri' 
							
							 where d_id='$d_d_id'  ";
							    
	
	
	$run_update_doctor_schedule_query=mysqli_query($db,$update_doctor_schedule_query);
	if($run_update_doctor_schedule_query)
	{
	$update_msg="updated ";
		echo"	<script> alert ('Your Scheduling Has Been Submitted')</script> ";
	
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


?><form class=" text-center text-drak text-xl-info font-weight-bold" action = "updating_consulting_hour.php" method="POST">
<h3>Enter Your ID :</h3>  <?php
echo $drow['id'];  echo "  " ;		         
 }   ?><br /><br />
 <input  style="color:#000000"type = "d_id" name="d_id"/> <br /><br />
 
 Saturday <br><input type ="checkbox" name ="Day_Time1[]" value="Saturday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
             <input type ="checkbox" name ="Day_Time1[]" value="Saturday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
             <input type ="checkbox" name ="Day_Time1[]" value="Saturday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
             <input type ="checkbox" name ="Day_Time1[]" value="Saturday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />
 
Sunday<br><input type ="checkbox" name ="Day_Time2[]" value="Sunday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
<input type ="checkbox" name ="Day_Time2[]"  value="Sunday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
<input type ="checkbox" name ="Day_Time2[]"  value="Sunday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
<input type ="checkbox" name ="Day_Time2[]"  value="Sunday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />

Monday<br><input type ="checkbox" name ="Day_Time3[]" value="Monday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
<input type ="checkbox" name ="Day_Time3[]"  value="Monday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
<input type ="checkbox" name ="Day_Time3[]"  value="Monday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
<input type ="checkbox" name ="Day_Time3[]"  value="Monday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />

Tuesday<br><input type ="checkbox" name ="Day_Time4[]" value="Tuesday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
<input type ="checkbox" name ="Day_Time4[]"  value="Tuesday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
<input type ="checkbox" name ="Day_Time4[]"  value="Tuesday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
<input type ="checkbox" name ="Day_Time4[]"  value="Tuesday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />

Wednesday<br><input type ="checkbox" name ="Day_Time5[]" value="Wednesday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
<input type ="checkbox" name ="Day_Time5[]"  value="Wednesday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
<input type ="checkbox" name ="Day_Time5[]"  value="Wednesday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
<input type ="checkbox" name ="Day_Time5[]"  value="Wednesday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />

Thursday<br><input type ="checkbox" name ="Day_Time6[]" value="Thursday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
<input type ="checkbox" name ="Day_Time6[]"  value="Thursday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
<input type ="checkbox" name ="Day_Time6[]"  value="Thursday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
<input type ="checkbox" name ="Day_Time6[]"  value="Thursday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />

Friday<br><input type ="checkbox" name ="Day_Time7[]" value="Friday 6:00 AM To 12:00 AM">  6:00 AM To 12:00 AM<br />
<input type ="checkbox" name ="Day_Time7[]"  value="Friday 12:30 PM To 6:00 PM">  12:30 PM To 6:00 PM<br />
<input type ="checkbox" name ="Day_Time7[]"  value="Friday 6:30 PM To 12:00 PM">  6:30 PM To 12:00 PM<br />
<input type ="checkbox" name ="Day_Time7[]"  value="Friday 12:30 AM To 5:30 AM"> 12:30 AM To 5:30 AM<br />
 <br /><button class="btn"><i class="fa fa- fa-2x "></i> <input style="color:#000000" class="text-xl-info font-weight-bold" type ="submit" name="submit" value="Submit"></i></button>  <br />
	
                
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form>
<div class="container ">
<ul class="pager font-weight-bold text-monospace text-danger success">
  <li class="center alert active"><a href="doctor_home_page.php">Back to home page</a></li>
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
