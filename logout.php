<?php

setcookie("user", "", time() );
header("location: ./login.php");
session_destroy();
$_SESSION=[];
$_COOKIE =[];

?>
<script>document.cookie="user=";</script>