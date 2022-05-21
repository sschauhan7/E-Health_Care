
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>request</title>
</head>
<style>ul{
font-size:24px;
}
h1{
font-size:50px;
padding-top:60px;


}
img 
{ float: left;
width: 77px;
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
<body class="container display-1">
<h1  class="text-center font-weight-bold text-white  ">All The Doctor's Registration Request</h1><hr></br>
<form  action = "doc_reg_request.php" method="POST">
<table border="1" cellPadding="13" align="center" 
class="table table-hover table-dark">

<tr>
<th class="text-center text-dark active"><h3>Name</h3></th>
<th class="text-center text-dark active"><h3>Specialism</h3></th>
<th class="text-center text-dark active"><h3>Status</h3></th>
<th class="text-center text-dark active"><h3>Date</h3></th>
<th class="text-center text-dark active" > <h3>Approval</h3></th>
<th class="text-center text-dark active"><h3>Rejection</h3></th>
</tr>

<?php
session_start();
include("connection.php");	

                          
                          
			
 if(isset($_GET["id"]))
				   {
				$d_id=$_GET['id'];
       $denied_query = "UPDATE
                    doctor set permission='Approved' where id='$d_id' ";
				   $run = mysqli_query($db, $denied_query);
				   
				   }
				   $queryPermission="WHERE permission='Pending' ";
       $show_pending_request_query = "SELECT * 
                  FROM doctor $queryPermission 
				  order by permission='Pending' desc";
				   $run = mysqli_query($db, $show_pending_request_query);
				  
				   while($row = mysqli_fetch_array($run))
				   {

				      ?>

                       <tr>
                    
                        <th> <h3><?php  echo "<a href='req_detail.php?id={$row['id']}'>{$row['f_name']}{$row['l_name']}</a>";  ?></h3></th>
                        <th><h3><?php  echo  $row['specialist'] . "<br />";?></h3></th>
                        <th> <h3><?php  echo  $row['permission'] . "<br />";?></h3></th>
                        <th> <h3><?php  echo $row['date']. "<br />";?></h3></th>
                        <th > <h3><?php  echo "<a href='doc_reg_request.php?id={$row['id']}'>Approved</a>";  ?></h3></th>
                        <th><h3><?php  echo "<a href='req_delete.php?id={$row['id']}'>Reject/Remove Account</a>";  ?></h3></th>
                        
                      </tr>
                     
				    <?php
					  }
					  ?>
                  
            
				 
 </table>    
</form>
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="view_admin_home_page.php">Previous</a></li>
  <li class="next"><a href="list_appointed_patients.php">Next</a></li>
</ul></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>
</html>
