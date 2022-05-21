<style>
<?php

include '../style1.css';

?>
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>req_delete</title>
</head>
<style>
h1{
font-size:50px;
padding-left:400px;
padding-top:60px;
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
<form  action = "req_delete.php" method="POST">

<?php
session_start();
include("connection.php");

 if(isset($_GET["id"]))
				   {
				 
				$d_id=$_GET['id'];
       $denied_query = "DELETE 
                   FROM doctor $queryPermission where id='$d_id' ";
				   $run = mysqli_query($db, $denied_query);
				   
				 }
				   $queryPermission="WHERE permission='Pending' ";
       $show_pending_request_query = "SELECT * 
                  FROM doctor $queryPermission ";
				   $run = mysqli_query($db, $show_pending_request_query);
			
                   while($row = mysqli_fetch_array($run))
				   {
				  
				
                 	  header("Location:doc_reg_request.php");
			
               
				 }
				 ?>
               
             </table>
        
   </form>
 
<h2><a target="_blank" href="view_admin_home_page.php?filename=index">Back</a></h2> </p>
</body>
</html>
