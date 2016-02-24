<?php 
include_once('database/database.php');
 ?>
<html>
<head>
	<title>teacher</title>
</head>
<body>
<?php 
include("slider.php");
 ?>

<?php 
if(isset($_GET['action']) && $_GET['action']=='delete'&&(isset($_GET['id']))){  //for delete
	$id = intval($_GET['id']);
	$sql_query = "DELETE FROM tblteacher WHERE user_id = $id";
	$result = $connect->query($sql_query);
	if($result>0){
		$message['delete'] = "Successfully Deleted";
	}else{
		echo"Unsuccess";
	}
}
 ?>

 <div class="content">
 	<div class=add><a href="adduser.php"><button>Add Teacher</button></a></div>
 	<b> Teacher Of Broadway Information Table</b>
<table border="1">
	<thead>
<th>
<td>SN</td> 
<td>Fullname</td>
<td>username</td>
<td>Email</td>
<td>Phone No.</td>
<td>Place</td>
<td>Join Date</td>
<td>Time</td>
<td>Action</td>
</th>
    </thead>
<?php $SN = '1';
 ?>
<?php 
$sql_query = "SELECT * FROM tblteacher"; 
$result = $connect->query($sql_query);
if ($result)
	while($row = $result->fetch_assoc()){
	?>	

     <tbody>
<th>
	<td><?php echo $SN;?></td>
	<td><?php echo $row['full_name'];?></td>
	<td><?php echo $row['user_name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['phone_no']; ?></td>
	<td><?php echo $row['place']; ?></td>
	<td><?php echo $row['join_date']; ?></td>
	<td><?php echo $row['time']; ?></td>
	<td><?php echo "<a href='?action=delete&id=$row[user_id]'>Delete</a>"; ?>
     <a href="edituser.php?id=<?php echo $row['user_id']; ?>">Edit</a>
	</td>
</th>
      </tbody>
      <?php
      $SN++;
  }
  ?>

</table>

 </div>
 
	<?php
 include("footer.php");
 ?>
</body>
</html>