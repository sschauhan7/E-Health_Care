
<style>
<?php

include '../style1.css';

?>

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>chat</title>

</head>
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

<style>
h1{
font-size:50px;
padding-left:590px;
padding-top:60px;
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
<?php
include "connection.php" ;
include 'translate.php';

?>
<div id="container">
<div id="chatbox">

<?php
$query = "SELECT * FROM chat ORDER BY id DESC";
$run = $db->query($query);

while ($row=$run->fetch_array()) :
?>

<div id="chat_data">
	<span style="color:green;"><?= $row['name']; ?></span>
	<span style="color:brown;"><?= $row['message']; ?></span>
    <span style="float:right;"><?= $row['date']; ?></span>
    </div>
<?php endwhile; ?>

    </div>
   <form method="post" action="chat.php">
   <input type ="text" name="name" placeholder="enter your name" />
   <textarea name="message" placeholder="enter your message" ></textarea>
    <input type="submit" name="submit" value="Send Message" />
    </form>
    <?php
	if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$message = $_POST['message'];
		$query ="INSERT INTO chat ( name , message) values ('$name' , '$message')";
		$run =$db->query($query);
		if($run){
		echo" <embed loop='false' src='chat.wav' hidden= 'true' autoplay='true' />";
		}
	}
	?>
   </div>
   
<h2><a target="_blank" href="view_user_home_page.php">Back</a></h2> </p>
</body>
</html>
