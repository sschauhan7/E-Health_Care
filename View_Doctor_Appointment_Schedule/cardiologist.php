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
<body class="container display-4">
           <h1 class="text-white shadow-lg">All The Doctor's Of  Cardiologist</h1><table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" >Name</th>
      <th scope="col" >Specialist</th>

    </tr>
  </thead>
<?php 
include("../connection.php");
include("../translate.php");

       $query = "SELECT * 
                     FROM doctor inner join schedule on schedule.d_id=doctor.id  where permission='approved' AND specialist like'cardiologist%' OR permission='Added' AND specialist like'cardiologist%' ";
				   $run = mysqli_query($db, $query);
				   while($row = mysqli_fetch_array($run))
				   {
				         
						  echo  "<h3><tr><th><a href='appointment_detail.php?s_id={$row['s_id']}'>{$row['f_name']}{$row['l_name']}</a></th></h3>";
						    
						   echo "<h3><th>". $row['specialist'] ." </th></tr></h3>" ;
						   
						  
				   }
				    
			   ?></table> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


</body>
</html>
