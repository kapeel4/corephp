<?php 
include_once('database/database.php');
 ?>
 <?php 
session_start();
  ?>
  <!DOCTYPE html>
<html lang="en"> 
<head>
	<title>admin login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/screen.css">
	<style type="text/css">
		.mybtn{background-color: red;}
	</style>
</head>
<body>
	<?php 
	if(isset($_POST['login'])) {
		$username = $_POST['uname'];
		$password = $_POST['password'];
		$_SESSION['name'] = $username;
		if(empty($username)){
			$error['username'] = "<message>* This field is required</message>";
		}
		if(empty($password)){
			$error['password'] = "<message>* This field is required</message>";
		}

		$sql_query = "SELECT * FROM tbluser WHERE user_name = '$username' AND password = '$password'";
		$result = $connect->query($sql_query);
		if ($result && $result-> num_rows>0) {
			header("location:dashboard.php");
		}else{
			echo "<h2>Login Failed</h2>";
		}
	}
	 ?>
	<div class="panel panel-warning  col-md-6 col-md-offset-3">
	  <div class="panel-heading">Admin Login</div>
	  <div class="panel-body">
		<form method="POST" class="form-horizontal" id="loginfrom">
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="username" name="uname" placeholder="Username">
				<?php echo isset($error['username']) ? $error['username'] : '' ; ?>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="password" name="password" placeholder="Password">
				<?php echo isset($error['password']) ? $error['password'] : ''; ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="login"  class="btn btn-primary pull-right" value="Login">
				</div>
			</div>
		</form>
	  </div>
	</div>

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
 <div class="col-md-6">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Sign up
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <div class="modal-body">
        <div class="form-group">
			<label for="username" class="col-md-4 control-label">Username</label>
			<div class="col-md-8">
			<input type="text" class="form-control" id="username" name="uname" placeholder="Enter the username">
			<?php echo isset($error['username']) ? $error['username'] : ''; ?>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-md-4 control-label">Password</label>
			<div class="col-md-8">
			<input type="text" class="form-control" id="password" name="password" placeholder="Enter the password">
			<?php echo isset($error['password']) ? $error['password'] : ''; ?>
			</div>
		</div>
		<div class="form-group">
			<label for="cpassword" class="col-md-4 control-label">Confirm Password</label>
			<div class="col-md-8">
			<input type="text" class="form-control" id="cpassword" name="cpassword" placeholder="Enter the confirm password">
			<?php echo isset($error['conformpass']) ? $error['conformpass'] : ''; ?>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
			<input type="text" class="form-control" id="email" name="email" placeholder="Enter the email">
			<?php echo isset($error['email']) ? $error['email'] : ''; ?>
			</div>
		</div>
		<input type="submit" name="signup" class="btn btn-primary" value="Signup">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  </div>

<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#loginfrom").validate({
	rules:{
		uname:{
			required:true
		},
		password:{
			required:true
		}
	},
	messages:{
		uname : "<i>* Please enter the username </i> ",
		password: "<i>* Please enter the password </i> "
	}
})
</script>
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