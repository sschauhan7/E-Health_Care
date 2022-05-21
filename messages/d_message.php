<style>
#left {
         
         float: left;
		 width: 50%;
         font-size: 15px;
		
      }
	 
	  #right {

float:right;
width:50%;
font-size: 15px;

      }
	  #last{
	  clear:both;
	  }
	  </style>
   

<style>
h1{
font-size:50px;
text-align:center;
padding-top:60px;
}
img 
{ float: left;
width: 77px;
}
ul{
font-size:24px;
}

li{
font-size:24px;
}

body {margin:0;
padding:0;
font-family:"Bahnschrift Light", "Bernard MT Condensed", "Berlin Sans FB Demi", "Bell MT";
width:100%;
height:100vh;
background-image:url(../pic/1.jpg);
background-size:cover;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>message</title>
</head>

<body><h1 align="center" class="text-capitalize text-center text-dark" style="font-size:36px">Message</h1><hr><br><br><br>
<?php 
include("../connection.php");
session_start();
$d_email=$_SESSION['email'];
if(isset($_POST["submit"])){
$d_email = $_SESSION['email'];

$m_d_id=$_POST['m_d_id'];

$sid=$_POST['sid'];
$pid=$_POST['pid'];
$d_text=$_POST['d_text'];

$date=$_POST['date'];


	

	
	if(empty($sid))
	   {
	   $error_msg="Enter Your ID";
	   }
	   	 elseif(empty($pid))
	   {
	   $error_msg="Enter This Id";
	   }
	
	elseif(empty($d_text))
	   {
	   $error_msg="Select Date";
	   }

	   
	  
	  
	
	   else
	   
	   { $d_query="INSERT INTO doc_message(sid,pid,d_text)     
	                            VALUES('$sid','$pid','$d_text')" ;
								mysqli_query($db,$d_query);
								$update_msg="Message Send";
					echo"	<script> alert ('Your Message Has Been Send Successfully')</script> ";
					
				
							 }
		
	
}
	
		
		  

?>
<div id="left" class="alert-light" class="font-weight-bold font-italic" style=" color:#000000" style="border:thick">
 <h2 style="color:#0000cc" style="font-size:16px">Replay Message to Doctor's</h2><hr>
  <span class=" text-primary text-capitalize text-center font-italic" >  <?php
   session_start();
$d_email=$_SESSION['email'];
 
  $echo_doc_text="select doc_message.date as ddate, doc_message.d_text as dmtext,doc_message.date ,schedule.s_id as dsid, user.id as uid,user.f_name as fname,user.l_name as lname, doctor.f_name as dfname,doctor.l_name as dlname from doctor join schedule on schedule.d_id=doctor.id join doc_message on schedule.s_id=doc_message.sid join user on user.id=doc_message.pid    where doctor.email='$d_email'  " ;
	
	$run_doc_text=mysqli_query($db,$echo_doc_text);
 
				   while($drow = mysqli_fetch_array($run_doc_text))
				   {
				   ?>
                   
				   <?php echo   $drow['dfname'];?>
				   <?php echo   $drow['dlname'];  ?></h3> &nbsp;&nbsp;&nbsp;
				<div class=" text-danger" style="font-size:24px">   <?php  echo  $drow['dmtext'];?></div> to 
				   
				 
         <h3 class="text-capitalize font-italic font-weight-bold" style="font-size:16px" > <?php echo  "<a  href='../Admin/user_detail.php?id={$drow['uid']}'>{$drow['fname']}{$drow['lname']}</a>";?></h3>&nbsp;&nbsp;&nbsp; on 
				   
				  
				  <?php echo $drow['ddate'];?><br><br><br><br>
                    <?php
				   }
				  ?>
                  </div>
                  <div id="right" class="alert-light">
                  <h2 style="color: #0000CC" style="font-size:16px">All the Messages from Patients</h2><hr>	
                   <?php
   $d_email=$_SESSION['email'];
 $mid=mysqli_query($db,$_GET['mid']);
  $echo_user_text="select message.date as udate,message.text as mtext,message.date, schedule.s_id as dsid, user.id as uid,user.f_name as fname,user.l_name as lname, doctor.f_name as dfname,doctor.l_name as dlname from doctor join schedule on schedule.d_id=doctor.id join message on schedule.s_id=message.sid join user on user.id=message.pid    where doctor.email='$d_email'  " ;
	
	$run_user_text=mysqli_query($db,$echo_user_text);
 
				   while($drow = mysqli_fetch_array($run_user_text))
				   {
				   ?>
                 
                 <div class="font-weight-bold font-italic" style=" color:#000000" >  Patient's/User' ID : 
		     <?php
				   echo   $drow['uid']; ?></div>
         <h3 class="text-capitalize font-italic font-weight-bold" style="font-size:16px" > &nbsp;&nbsp;&nbsp; 
				<?php echo  "<a href='../Admin/user_detail.php?id={$drow['uid']}'>{$drow['fname']}{$drow['lname']}</a>";?></h3>
				<span class=" text-danger" style="font-size:24px"><?php   echo $drow['mtext'];?></span>&nbsp;&nbsp;&nbsp; on 
				   
				
         <h3 class="text-capitalize font-italic font-weight-bold" style="font-size:16px" >
				   <?php 
				   echo $drow['udate'];?></h3><br><br><br><br>
                    <?php
				   }
				  ?>
</div>
<div id="last"><hr>	
<h1 align="center" class="text-capitalize text-center text-warning font-weight-bold" style="font-size:36px">Reply Message</h1><br><br><br>
<ul class="text-center font-weight-bold text-monospace text-dark"> <form class=" text-center text-xl-info font-weight-bold" action = "d_message.php" method="POST">

<?php
$d_email=$_SESSION['email'];

	$doctor_sid_show_squery="select * from doctor join schedule on schedule.d_id=doctor.id   where email='$d_email'" ;
	
	$doctor_sid_squery=mysqli_query($db,$doctor_sid_show_squery);
 
				   while($d_s_row = mysqli_fetch_array($doctor_sid_squery))
				   {
				   ?>

 <h3 class="alert font-weight-bold" style="font-size:36px"> Enter Your ID : </h3> <?php
echo $d_s_row['s_id'];  echo "  " ;		         
 }   ?> <input type = "sid" name="sid"  class="border-info breadcrumb center-block"/> <br /><br />
  
 <h3 class="alert font-weight-bold" style="font-size:36px"> Enter Patient's /User's ID :</h3>
  <input  class="border-info breadcrumb center-block"type = "pid" name="pid"/> <br /><br />
 <h3 class="alert font-weight-bold" style="font-size:36px"> Enter Message : </h3><textarea name="d_text" placeholder="enter your message" class="border-info breadcrumb center-block" cols="50" rows="10"></textarea>
 <br /> <input type ="submit" name="submit" class="btn btn-info alert border-dark"  style="font-size:24px"value="Reply"><br />
                  
  <?php              
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form></ul>
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  
  <li class="center border-dark"><a href="../Doctor/doctor_home_page.php">Back to home page</a></li>
</ul></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</div>
</body>
</html>