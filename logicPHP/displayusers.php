<?php
include "./logicPHP/config.php";
$query = "SELECT * FROM user_details";
 mysqli_select_db($conn,$dbname);  //use database
$res =  mysqli_query($conn ,$query);
$users = mysqli_fetch_all($res ,MYSQLI_ASSOC);
?>










