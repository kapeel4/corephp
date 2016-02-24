<?php 
include_once('database/database.php');
 ?>
<html>
<head>
	<title>signup</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background:#000;">



<div class="signup_form">

<?php 
if(isset($_POST['signup'])) {
	$username = $_POST['uname'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	if(empty($username)){
		$error['username'] = "<message>* This field is required</message>";
	}
	if(empty($password)){
		$error['password'] = "<message>* This field is required</message>";
	}
	if(empty($cpassword)){
		$error['conformpass'] = "<message>* This field is required</message>";
	}
	if(empty($email)){
		$error['email'] = "<message>* This field is required</message>";
	}
else{
	$sql_query = "INSERT INTO tbluser (user_name, password, email) VALUES ('$username', '$password', '$email')";
	$result = $connect->query($sql_query);
	if ($result) {
		echo "<h3>Signup Successful</h3>";
	}else{
		echo "<h4>Signup Unsuccessful</h4>";
	}
	}
}
 ?>

	<a href="index.php" class="link">×</a>
<form method="POST" id="signupform">
		 <div class="toptxt1">Admin signup</div>
<br><br>
<label class="lab">Username</label>
<input type="text" name="uname" placeholder="Enter the username"><br>
<?php echo isset($error['username']) ? $error['username'] : ''; ?><br>
<label class="lab">Password</label>
<input type="text" name="password" placeholder="Enter the password" id="password"><br>
<?php echo isset($error['password']) ? $error['password'] : ''; ?><br>
<label class="lab">Conform Password</label>
<input type="text" name="cpassword" placeholder="Enter the password again"><br>
<?php echo isset($error['conformpass']) ? $error['conformpass'] : ''; ?><br>
<label class="lab">Email</label>
<input type="text" name="email" placeholder="Enter the email"><br>
<?php echo isset($error['email']) ? $error['email'] : ''; ?><br>
<input type="submit" name="signup" value="Signup"><br><br>

<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#signupform").validate({
	rules:{
		uname:{
			required:true
		},
		password:{
			required:true,
			minlength:5
		},
		cpassword:{
			required:true,
			equalTo:"#password",
			minlength:5
		},
		email:{
			required:true,
			email:true
		}
	}
})
</script>
</body>
</html>