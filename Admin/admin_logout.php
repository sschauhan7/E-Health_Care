<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin_logout</title>
</head>

<body>
<?php
error_reporting(0);

include("connection.php");
session_start();
session_destroy();
unset($SESSION['admin_id']);

	  header("Location:adminlogin.php");
	  ?>
</body>
</html>
