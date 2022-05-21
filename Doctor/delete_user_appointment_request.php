<style>
<?php

include '../style1.css';

?>

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>delete_user_appointment_request</title>
</head>

<style>
h1{
font-size:50px;
padding-left:590px;
padding-top:60px;
}
ul{
font-size:24px;
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
<h1>Cancel Booking</h1>
<form  action = "delete_user_appointment_request.php" method="POST">
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
<th scope="col">Rejection</th>
    </tr>
  </thead>



<?php
session_start();
include("connection.php");	

                          
                          
			
 if(isset($_GET["id"]))
				   {
				$id=$_GET['id'];
       $denied_query = "UPDATE
                   user set permission='Rejected' where id='$id' ";
				   $run = mysqli_query($db, $denied_query);
				   
				   }
				   $queryPermission="WHERE permission='Approved'  ";
       $show_pending_request_query = "SELECT * 
                  FROM user $queryPermission ";
				   $run = mysqli_query($db, $show_pending_request_query);
				  
				   while($row = mysqli_fetch_array($run))
				   {

				        header("Location:user_appointment_request.php");
					  }
					  ?>
                  
            
				</table> 
    
</form>
 
<div class="container ">
<ul class="pager  text-center font-weight-bold text-monospace">
  <li class="previous "><a href="user_appointment_request.php">Previous</a></li>
</ul></div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script></body>
</html>