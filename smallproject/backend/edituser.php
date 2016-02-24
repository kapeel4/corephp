<?php 
include_once('database/database.php');
 ?>
 <html> 
<head>
	<title>Edit</title>
</head> 
<body> 
	<?php 
include('slider.php');
 ?>
 <?php //php for edit
$id = $_GET['id'];
$sql_query = "SELECT * FROM tblteacher WHERE user_id = $id";
$result = $connect-> query($sql_query);
if($result && $result-> num_rows>0){
	while ($row=$result->fetch_assoc()) {
		$id = $row['user_id'];
		$full_name = $row['full_name'];
		$user_name = $row['user_name'];
		$email = $row['email'];
		$phone_no = $row['phone_no'];
	    $join_date = $row['join_date'];
	    $time = $row['time'];
	}
}
 ?>

 <?php 
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$full_name = $_POST['fullname'];
	$user_name = $_POST['username'];
	$email = $_POST['email'];
	$phone_no = $_POST['phoneno'];
	$join_date = $_POST['joindt'];
	$time = $_POST['time'];

	$sql_query = "UPDATE tblteacher SET full_name = '$full_name', user_name = '$user_name', phone_no = '$phone_no', email = '$email', place = '$place' , join_date = '$join_date' , time = '$time' WHERE user_id = '$id' ";
    $result = $connect->query($sql_query);
    if($result){
    	header("location:teacher.php");
    }
    else{
    	echo "NOT UPDATED";
    }
}
  ?>
 
<div class="content">
	<div class="log" style="margin:25px 290px 0px 0px; background:skyblue;">
	<form method="POST">
<label>ID</label>
<input type="text" name="id" value="<?php echo $id; ?>" readonLy><br>
<label>Full Name :</label>
<input type="text" name="fullname" value="<?php echo $full_name; ?>"placeholder="Enter full name"><br>
<label>Username :</label>
<input type="text" name="username" value="<?php echo $user_name; ?>" placeholder="Enter username" ><br>
<label>Email :</label>
<input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter email" ><br>
<label>Phone No :</label>
<input type="text" name="phoneno" value="<?php echo $phone_no; ?>" placeholder="Enter phone no." ><br>
<label>Join DATE :</label>
<input type="text" name="joindt" value="<?php echo $join_date; ?>" placeholder="Enter phone join date" ><br>
<label>Time :</label>
<input type="text" name="time" value="<?php echo $time; ?>" placeholder="Enter time" ><br>
<input type="submit" name="edit" value="Update">
</form>
</div>
</div>
<?php 
include("footer.php");
 ?>

</body>
</html>