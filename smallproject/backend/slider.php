<?php 
include_once('database/database.php');
 ?>
<html>
<head>
	<title>slider</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="bbody">


<nav>
	<img src="images/logo.jpg">
<ul>
<li><a href="dashboard.php">Dashboard</a></li><hr>
<li><a href="teacher.php">Teacher</a></li><hr>
<li><a href="aboutus.php">About us</a></li><hr>
</ul>
</nav>

<div class="log">
<form method="POST">
<input type="submit" name="logout" value="Logout" title="user logout">
 </form>
 <?php 
if(isset($_POST['logout'])) {
	session_destroy();
	header("location:index.php");
}
  ?>
</div>


</body>
</html>