<?php 
include_once('database/database.php');
 ?>
<?php 
session_start();
 ?>
<html>
<head>
	<title>dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php 
include("slider.php");
 ?>
 <div class="content" style="background:url(images/conback.jpg); background-repeat: no-repeat; background-size: 940px 570px; ">
<b style="color:orange;">
<?php 
if(isset($_SESSION['name'])) {
	echo "Welcome ".$_SESSION['name'];
}
	 ?>
	</b>

<div class="info" >
ADMIN PANEL
</div>
 </div>
 
	<?php
 include("footer.php");
 ?>

 
</body>
</html>