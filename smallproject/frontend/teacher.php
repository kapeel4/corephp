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
 <div class="content">
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