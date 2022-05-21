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

<title>medicine_delete</title>
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
<h1 class="text-center font-weight-bold text-white ">All The Doctor's Of  Medicine</h1>
<form class="text-center text-capitalize font-weight-bold"  method="POST">
<table  border="1" cellPadding="13" align="center" 
class="table table-hover table-dark">
<thead>
<tr>
<th class="active text-dark"><h2>Name</h2></th>
<th class="active text-dark"><h2>Specialism</h2></th>
<th class="active "><h2><input class="alert-danger" type ="submit" value="Delete" name="submit"></h2></th>
</tr></thead>
   
<?php 
session_start();
include("connection.php");
 if(isset($_REQUEST["submit"]))
				   {
				   $check=$_REQUEST["check"];
				   $save=implode(",",$check);
				$d_id=$_GET['id'];
       $query = "DELETE 
                   FROM doctor where id in ($save) ";
				   $run = mysqli_query($db, $query);
				   
				   }
				    $queryPermission="WHERE permission='Approved' || permission='Added' ";
       $query = "SELECT * 
                  FROM doctor inner join schedule on schedule.d_id=doctor.id  where permission='approved' AND specialist like'm%' OR permission='Added' AND specialist like'm%' ";
				   $run = mysqli_query($db, $query);
				  
				   while($row = mysqli_fetch_array($run))
				   {

				      ?>
                      <tr>
                      
						 <th><h3><?php  echo "<a href='detail.php?s_id={$row['s_id']}'>{$row['f_name']}{$row['l_name']}</a>";  ?></h3></th>
                          <th><h3><?php  echo  $row['specialist'] . "<br />";?></h3></th>
                           <th><input type ="checkbox" name ="check[] "value="<?php echo $row['id']?> "></th>
                           </tr>
				         
						<?php 
						  
				   }
				    
			   ?>
               
             </table>
          
             </form>   
 
 
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="doctor_name_display.php">Previous</a></li>
  <li class="next"><a href="bone_delete.php">Next</a></li>
</ul></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
