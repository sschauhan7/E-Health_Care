<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User_home_page</title>
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
<style>

 body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
}
  .container {
      padding: 80px 120px;
  }


  .nav-tabs li a {
      color:#999999;
  } 
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 16px !important;
	font-weight:900;
      letter-spacing: 3px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  

  .nav-tabs li a {
      color:#999999;
  } 
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
   .container-fluid {
      padding: 5px 20px;
  }  .carousel-inner img {
    -webkit-filter: grayscale(98%);
      filter: grayscale(98%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .fa {
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
  font-size: 20px;
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

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" >
<?php include("connection.php");
error_reporting(0);



          
    
	
	
	            if(isset($_POST["search"]))
				 $name= $_POST['specialist'];
				
				{
				         $query1 = "SELECT *
				                     FROM doctor
							          WHERE  f_name='$_POST[f_name]'";
							   $run = mysqli_query($db, $query1);
							   
								   while($row=mysqli_fetch_array($run))
							   {
							      
								    echo $row["id"];
								   echo $row["f_name"];
								   echo $row["l_name"];
								  echo $row["specialist"];
								
								
						
							   }
							     }
							   
							
							   ?>
                          
                       <?php
if(isset($error_msg)){echo $error_msg;}
?>
</form>
<?php
     session_start();

                 $email=$_SESSION['email'];
?>   

<?php $edit_doctor_profile_query="select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where user.email='$email'" ;
$edit_run_doctor_profile_query=mysqli_query($db,$edit_doctor_profile_query);
                              while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				                  {}
								  ?>
                                  <?php
 $queryPermission="WHERE permission='Pending' ";
  $show_number_pending_request_query = "select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id   where user.email='$email'  and  appointment.permission='Approved' ||  user.email='$email'  and  appointment.permission='Canceled' 
                
				";
				   $run = mysqli_query($db, $show_number_pending_request_query);
				   $count=mysqli_num_rows($run);
	

 
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid ">
    <div class="navbar-header">       
     <a class="navbar-brand text-dark" href="#myPage"><strong>e-healthcare</strong></a>
    <div class="collapse navbar-collapse" id="myNavbar">             
      <ul class="nav navbar-nav navbar-right">

<li><a href='profile.php'> Profile</a></li>
<li><a href="../disease_prediction.php">Suggest Doctor</a></li>
        



  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#Appointment">Appointments<span class="caret"></span></i></a>
          <ul class="dropdown-menu"> 
<li><a href="../View_Doctor_Appointment_Schedule/doctor_schedule_list.php">Booking Appointment</a></li>

<li><a href="view_users_appointment.php">My Appointments</a></li>
        </ul>
        </li>

  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#Appointment">Consulting<span class="caret"></span></i></a>
          <ul class="dropdown-menu"> 
<li><a href="../view_consulting_hour/doctor_schedule_list.php">Consulting Hour</a></li>

<li><a href="../messages/message.php">Consultation</a></li>
        </ul>
        </li>

<li><a href="accept_appointment.php"><i class="fa fa-bell"><?php if($count>0)
{

} 
echo '('.$count.')'?></i></a></li>

<li><a href=userlogout.php><i class="fa fa-sign-out"></i></a></li>
     <li>
       <form action = "../search.php" method = "POST">

 <input type = "text" name="f_name" placeholder="Search By Doctor Name..." />
                   <input  type="submit"name="search"  value="GO" />
                   
                       <?php
if(isset($error_msg)){echo $error_msg;}
?>
       </form></li>
<?php
	   include '../translate.php';?>
      </ul>
    </div></div>
  </div>
  </div>
</nav>
 
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Background image -->
    <div class="carousel-inner" role="listbox" >
      <div class="item active">
        <img src="../pic/1.jpg" alt="img1" width="1500" height="800" title="User Home Page">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><ol class="w3-padding w3-black w3-opacity-min"><b>You can see Your Profile . You can see Available Doctors.</b></ol></h1>
  </div>
    </div></div></div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
