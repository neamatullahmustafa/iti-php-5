<?php
include "./logicPHP/config.php";
$id = $_GET['id'];
$query = "DELETE FROM `user_details` WHERE user_id = $id";
mysqli_select_db($conn, $dbname);
$res =  mysqli_query($conn, $query);
mysqli_close($conn);
header("location: ./index.php");

?>
