
<style>
<?php

include '../style1.css';

?>
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>delete</title>
</head><style>
h1{
font-size:50px;
padding-left:400px;
padding-top:60px;
}

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

<body>
<?php 
session_start();
include("connection.php");
$d_id=$_GET['id'];
       $query = "DELETE 
                   FROM doctor where id='$d_id' ";
				   $run = mysqli_query($db, $query);
				   if($run)
				   {
				   echo "<script> alert ('Record Deleted')</script>";
				   ?>
                  <meta http-equiv="Refresh" content="0; URL=http://localhost:8086/online_medical_service/Admin/doctor_name_display.php" > 
                  <?php
				  }
				  else {
				  echo "delete process failed";
				  }
				  ?>
                          
 
<h2><a target="_blank" href="view_admin_home_page.php?filename=index">Back</a></h2> </p>
 
                   
</body>
</html>
