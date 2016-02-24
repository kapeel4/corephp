<?php 
$host = "localhost"; //server
$user_name = "root"; //db username
$password = ""; //db password
$database = "broadway_mgmt"; //connect database

$connect = new mysqli($host, $user_name, $password, $database) or die("Error:" .mysqli_error());
 ?>
  