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

<title>Doctor List</title>
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
<?php 
include("../connection.php");
include '../translate.php';


?>  
<body class="container display-4">
           <h1 class="text-white shadow-lg">All The Doctor's Schedule List</h1>
           
<table class="table table-hover table-dark">

  <thead>
    <tr>
      
      <th scope="col" class="text-center text-warning">Specialist Name</th>

    </tr>
  </thead>
<tr><th class="text-center"><a href=medicine.php>Medicine</a></th></tr>

<tr><th class="text-center"><a href=bone.php>Orthopedic</a></th></tr>

<tr><th class="text-center"><a href=dentist.php>Dentist</a></th></tr>

<tr><th class="text-center"><a href=cardiac_electrophysiologist.php>Cardiac electrophysiologist</a></th></tr>

<tr><th class="text-center"><a href=cardiologist.php>Cardiologist</a></th></tr>

<tr><th class="text-center"><a href=surgeon.php>Surgeon</a></th></tr>

<tr><th class="text-center"><a href=gynecologist.php>Gynecologist</a></th></tr></table>
      
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="../Users/view_user_home_page.php">Previous</a></li>
  <li class="next"><a href="../Users/view_users_appointment.php">Next</a></li>
</ul></div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                  </body>
</html>
