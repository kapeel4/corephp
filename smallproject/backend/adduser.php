<?php 
include_once('database/database.php');
 ?>
<?php 
session_start();
 ?>
<html>
<head>
	<title>add user</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php 
include("slider.php");
 ?>

 <?php 
  
 if(isset($_POST['submit'])){
 	$fullname = $_POST['full_name'];
 	$username = $_POST['user_name'];
 	$email = $_POST['email'];
 	$phoneno = $_POST['phone_no'];
 	$place = $_POST['place'];
 	$joindt = $_POST['join'];
 	$time = $_POST['time'];

 	if(empty($fullname)){
 		$error['fullname'] = "<message>*This field is required</message>";
 	}
 	if(empty($username)){
 		$error['username'] = "<message>*This field is required</message>";
 	}
 	if(empty($email)){
 		$error['email'] = "<message>*This field is required</message>";
 	}
 	if(empty($phoneno)){
 		$error['phoneno'] = "<message>*This field is required</message>";
 	}
 	if(empty($place)){
 		$error['place'] = "<message>*This field is required</message>";
 	}
 	if(empty($joindt)){
 		$error['joindt'] = "<message>*This field is required</message>";
 	}
 	if(empty($time)){
 		$error['time'] = "<message>*This field is required</message>";
 	}
     else{
 	$sql_query = "INSERT INTO tblteacher (full_name, user_name, phone_no, email, place, join_date, time) VALUES('$fullname', '$username', '$email', '$phoneno', '$place', '$joindt', '$time')";
 	$result = $connect->query($sql_query);
 	if($result){
 		$info['info1'] = " Teacher Information Added Successfully";
 	}
 	else{
 		echo "Sorry error";
 	}
 }
 }
  ?>
 
 <div class="content">
 		<span><a href="teacher.php">Back</a></span><br>
 		<b style="color:green;"><?php echo isset($info['info1']) ? $info['info1'] : ''; ?></b>
<div class="log" style="margin:-15px 290px 0px 0px; background:skyblue;">
<form method="POST">
<label>Full Name :</label>
<input type="text" name="full_name" placeholder="Enter full name"><br><br>
<?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?><br>
<label>Username :</label>
<input type="text" name="user_name" placeholder="Enter username" ><br><br>
<?php echo isset($error['username']) ? $error['username'] : ''; ?><br>
<label>Email :</label>
<input type="text" name="email" placeholder="Enter email" ><br><br>
<?php echo isset($error['email']) ? $error['email'] : ''; ?><br>
<label>Phone No :</label>
<input type="text" name="phone_no" placeholder="Enter phone no." ><br><br>
<?php echo isset($error['phoneno']) ? $error['phoneno'] : ''; ?><br>
<label>Place :</label>
<input type="text" name="place" placeholder="Enter your place" ><br><br>
<?php echo isset($error['place']) ? $error['place'] : ''; ?><br>
<label>Join Date :</label>
<input type="text" name="join" placeholder="Enter join date" ><br><br>
<?php echo isset($error['joindt']) ? $error['joindt'] : ''; ?><br>
<label>Time :</label>
<input type="text" name="time" placeholder="Enter time" ><br><br>
<?php echo isset($error['time']) ? $error['time'] : ''; ?><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>
 </div>
 
	<?php
 include("footer.php");
 ?>

 
</body>
</html>