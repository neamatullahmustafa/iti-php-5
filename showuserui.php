 <?php 
include "./logicPHP/showuser.php";
include "./structure/header.php";
?>
<h1 class="m-5">show user</h1>
<h2>name</h2>
<p><?php echo $users['user_name']?></p>
<h2>email</h2>
<p><?php echo $users['user_email']?></p>
<h2>gender</h2>
<p><?php echo $users['user_gender']?></p>
<h2>mail state</h2>
<p><?php echo $users['user_receive']?></p>
<a type="button" class="btn btn-success m-5" href="./index.php">back</a> 
<?php 
include "./structure/footer.php"
?>