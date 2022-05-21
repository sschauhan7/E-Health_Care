<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user_detail</title>
</head>

<body>
<?php 
 if(isset($_GET['app_id'])){
 include("connection.php");
 $id=mysqli_query($db,$_GET['app_id']);
 	$show_user_profile_query="select * from user inner join appointment on user.id=appointment.pid inner join schedule on schedule.s_id-appointment.sid  WHERE app_id='$_GET[app_id]'" ;
	   $show_run_user_profile_query=mysqli_query($db,$show_user_profile_query);
	      $row = mysqli_fetch_array($show_run_user_profile_query);

				?>
                  
                             <h3>ID :    <?php  echo  $row['id'] . "<br />";?></br></h3> 
                             <h3> Name :  <?php  echo   $row['f_name']; echo  $row['l_name']. "<br />";?></br></h3>
                             <h3>Email/Gmail Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                             <h3>  Address :   <?php  echo  $row['address'] . "<br />";?></br></h3>
                         
                          
                         
					
						<?php 
					
				   } 
		   ?>
           
      
</body>
</html>
