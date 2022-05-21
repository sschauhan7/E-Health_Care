<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>doctor schedule updating</title>
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
<title>view_my_schedule</title>
</head><style>

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
  .fa {
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
  font-size: 17px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

</style>
<body class="container display-4 text-center">

                       
                        <!-- Grid -->
                  <div class="w3-row">

<div class="w3-col 18 s12">

  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container center-block">
                           
<h1 class="text-center font-weight-bold text-white-50 shadow-lg ">My Schedule Time</h1><hr />
<?php
session_start();
include("connection.php");
include '../translate.php';
$d_email=$_SESSION['email'];
$show_schedule= "SELECT * 
                 FROM doctor inner join schedule on schedule.d_id=doctor.id where email='$d_email'" ;
	
$show_schedule_query=mysqli_query($db,$show_schedule);
 
				   while($drow = mysqli_fetch_array($show_schedule_query))
				   {
				?>
                  <h3 class="text-center"> Name :  <?php  echo   $drow['f_name']; echo  $row['l_name']; ?> ...... Specialist of <?php echo $drow['specialist'];?></h3></br>
                            
                            
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time1']; ?></h3></br>
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time2']; ?></h3></br>   
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time3']; ?></h3></br>
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time4']; ?></h3></br>
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time5']; ?></h3></br>
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time6']; ?></h3></br>
                            <h3 class="text-center">  <?php  echo   $drow['Day_Time7']; ?></h3></br>
                            <?php
							}
							?>   
<div class="container ">
<ul class="pager text-danger font-weight-bold text-monospace">
  <li class="center "><a href="doctor_appointment_schedule_updating.php">Update Appointment Schedule</a></li>
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
