<?php 
$path = "localhost";
$uname = "root";
$pass = "";
$dbname = "users";
$conn = mysqli_connect($path,$uname,$pass,$dbname);
if (!$conn) {
    echo  "Error: Unable to connect to MySQL." . PHP_EOL;
}?>