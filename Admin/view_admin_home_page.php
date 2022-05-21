
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Smart medical service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
  .container {
      padding: 80px 120px;
  }
  .list-group-item:first-child {
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
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 16px !important;
	font-weight:900;
      letter-spacing: 2px;
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
coration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color:#999999;
  }  .container-fluid {
      padding: 5px 20px;
  }
  </style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" >
<?php
include("connection.php");

?>
<?php
 $queryPermission="WHERE permission='Pending' ";
  $show_number_pending_request_query = "SELECT * 
                  FROM doctor $queryPermission 
				   order by date='$d_date' asc
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
          

<li><a href='display_user.php'>Display All User List</a></li>
  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctors<span class="caret"></span></i></a>
          <ul class="dropdown-menu"> 
<li><a href='doctor_name_display.php'> Doctors Name display</a></li>

<li><a href='add_doctor.php'> Add Members/Doctor</a></li>
        </ul>
        </li>

<li><a href=doc_reg_request.php>Request <?php if($count>0)
{

} 
echo '('.$count.')'?></a></li>
<li><a href=list_appointed_patients.php>List Of All The Appointents</a></li>
<li><a href=admin_logout.php>Logout</a></li>

<li class=" active">
<?php
	   include '../translate.php';?></li>

      </ul>
    </div>
  </div>
  </div>
</nav>
 
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Background image -->
    <div class="carousel-inner" role="listbox" >
      <div class="item active">
        <img src="../pic/Doctor_Time.jpg" alt="img1" width="1500" height="800" title="Admin Home Page">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><ol class="w3-padding w3-black w3-opacity-min"><b>Admin Home Page </b></ol></h1>
  </div>
    </div></div></div>
                        
 
</body>

</html>
