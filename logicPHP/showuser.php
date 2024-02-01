<?php

include "./logicPHP/config.php";
$id =$_GET['id'];
$query = "SELECT * FROM user_details
WHERE user_id = $id";
mysqli_select_db($conn,$dbname);
$res = mysqli_query($conn ,$query);
$users = mysqli_fetch_assoc($res);
mysqli_close($conn);
?>