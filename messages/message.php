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

$m_id=$_POST['m_id'];
$pid=$_POST['pid'];
$sid=$_POST['sid'];
$text=$_POST['text'];
$u_date=$_POST['date'];


  
  
//$u_date=date("m/d/Y h:m:s a", time());
//strtolower(date("D",strtotime($u_date)));
//date("m/d/Y h:m:s a", time());	
//$_POST[".$u_date."];
	if(empty($pid))
	   {
	   $error_msg="Enter Your ID";
	   }
	   	 elseif(empty($sid))
	   {
	   $error_msg="Enter This Id";
	   }
	
	

	   
	  
	  
	
	   else
	   
	   { $u_query="INSERT INTO message(pid,sid,text)     
	                            VALUES('$pid','$sid','$text')" ;
								mysqli_query($db,$u_query);
								$update_msg="Message Send ";
					echo"	<script> alert ('Your Message Has Been Send Successfully')</script> ";
					
				
							 }
		
	
}
	
		
		  

?>
<div id="left" class="alert-light" class="font-weight-bold font-italic" style=" color:#000000" style="border:thick">
 <h2 style="color:#0000cc" style="font-size:16px">Replay Message to Doctor's</h2><hr>
  <span class=" text-primary text-capitalize text-center font-italic" > <?php
   session_start();
$email=$_SESSION['email'];
 
  $echo_user_text="select message.date as udate,message.text as mtext,message.date, schedule.s_id as dsid, user.f_name as fname,user.l_name as lname, doctor.f_name as dfname,doctor.l_name as dlname from doctor join schedule on schedule.d_id=doctor.id join message on schedule.s_id=message.sid join user on user.id=message.pid    where user.email='$email'  " ;
	
	$run_user_text=mysqli_query($db,$echo_user_text);
 
				   while($drow = mysqli_fetch_array($run_user_text))
				   {
				   echo   $drow['fname'];
				   echo   $drow['lname'];  ?></span> &nbsp;&nbsp;&nbsp;
				 <div class="text-danger" style="font-size:24px" >  <?php  echo   $drow['mtext'];?> </div>to
				   <?php
				 
           echo  "<a href='../View_Doctor_Appointment_Schedule/appointment_detail.php?s_id={$drow['dsid']}'>{$drow['dfname']}{$drow['dlname']}</a>";?>&nbsp;&nbsp;&nbsp;<div></div><br />
           <div class="text-black-50"> on 
				   
				  
				   <?php echo $drow['udate'];
                       // $t=date("m/d/Y h:m:s a", time());
                       // echo strtolower(date("D",strtotime($t))); ?>&nbsp;
				        <?php //echo date("m/d/Y h:m:s a", time()); ?><br></div><br />
                    <?php
				   }
				  ?></div>
                 <div id="right" class="alert-light"  class="font-weight-bold font-italic" style=" color:#000000" style="border:thick"> <h2 style="color:#0000cc" style="font-size:16px">All the Messages from Doctor's</h2><hr>	<h3 class="text-capitalize font-weight-bold font-italic">  <?php
   $email=$_SESSION['email'];
 $mid=mysqli_query($db,$_GET['mid']);
  $echo_doc_text="select doc_message.date as ddate, doc_message.d_text as dmtext,doc_message.date ,schedule.s_id as dsid, user.id as uid,user.f_name as fname,user.l_name as lname, doctor.f_name as dfname,doctor.l_name as dlname from doctor join schedule on schedule.d_id=doctor.id join doc_message on schedule.s_id=doc_message.sid join user on user.id=doc_message.pid    where user.email='$email'  " ;
	
	 $run_doc_text=mysqli_query($db, $echo_doc_text);
 
				   while($drow = mysqli_fetch_array($run_doc_text))
				   {
				   ?></h3>
                 <div class="font-weight-bold font-italic" style=" color:#000000" > Doctor's ID :
		    <?php
				   echo   $drow['dsid']; ?></div>&nbsp;&nbsp;&nbsp; 
				<span class="alert">  <?php echo  "<a href='../View_Doctor_Appointment_Schedule/appointment_detail.php?s_id={$drow['dsid']}'>{$drow['dfname']}{$drow['dlname']}</a>";?></span>&nbsp;&nbsp;&nbsp;
			<div class=" text-danger" style="font-size:24px">  	 <?php  echo $drow['dmtext'];
					?></div>&nbsp;&nbsp;&nbsp; <div class="font-weight-light">on 
				   
				  
				   <?php 
				   echo $drow['ddate'];
				      //  $t=date("m/d/Y h:m:s a", time());
                       // echo strtolower(date("D",strtotime($t))); ?>&nbsp;
				        <?php //echo date("m/d/Y h:m:s a", time()); ?></div><br>
                    <?php
				   }
				  ?></div>
				 
        <div id="last">   
        <hr><h1 align="center" class=" text-white">Reply Message</h1><br><br><br>        
<ul class="text-center font-weight-bold text-monospace text-dark  text-white"> <form class=" text-center text-xl-info  text-white font-weight-bold" action = "message.php" method="POST">


<?php
$email=$_SESSION['email'];

	$user_pid_show_pquery="select * from user   where email='$email'" ;
	
	$user_pid_pquery=mysqli_query($db,$user_pid_show_pquery);
 
				   while($u_p_row = mysqli_fetch_array($user_pid_pquery))
				   {
				   ?>
                  <h3  text-white> Enter Your ID : </h3> <?php
echo $u_p_row['id'];  echo "  " ;		         
 }   ?> <input type = "pid"class="border-info breadcrumb center-block" name="pid"/> <br /><br />
 
 <h3 class="alert font-weight-bold  text-white" style="font-size:36px"> Enter Doctor's ID :</h3>
  <input type = "sid" name="sid" class="border-info breadcrumb center-block"/> <br /><br />

 <h3 class="alert font-weight-bold text-white" style="font-size:36px">Enter Message :</h3> <textarea name="text" class="border-info breadcrumb center-block" cols="50" rows="10"placeholder="enter your message" ></textarea>
	<br /><input type ="submit" name="submit"class="btn btn-info alert border-dark"  style="font-size:24px"value="Reply"><br />
                  
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>
</form>
</ul>
<div class="container ">
<ul class="pager font-weight-bold text-monospace">
  
  <li class="center"><a href="../Users/view_user_home_page.php">Back to Home Page</a></li>
</ul></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</div>
</body>
</html>