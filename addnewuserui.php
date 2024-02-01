<?php 
include("./function/validation.php");
include "./structure/header.php";
?>
  <h1 class="m-5">add new user</h1>
  <form action="<?php 
  $_PHP_SELF
   ?>" method="POST" class="m-5">
    <div class="mb-3">
      <label for="exampleInputName1" class="form-label">name</label>
      <input type="text" name="user_name" class="form-control" value="<?php
                                                                      echo validateInputName('user_name',"submit");
                                                                      ?>" id="exampleInputName1">
    </div>
    <p class="text-danger"><?php echo validateInputError('user_name',"submit");
                            ?></p>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="user_email" class="form-control" value="<?php
                                                                        echo validateInputName('user_email',"submit");
                                                                        ?>" id="exampleInputEmail1">
    </div>
    <p class="text-danger"><?php echo validateInputError('user_email',"submit");
                            ?></p>
    <label class="form-check-label" for="genderDev">gender</label>
    <div class="form-check" id="genderDev">
      <input class="form-check-input" type="radio" name="user_gender" value="male" 
      <?php
       echo validateInputGender("male", "user_gender"); 
       ?> id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        male
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="user_gender" value="female" <?php echo validateInputGender("female", "user_gender"); ?> id="flexRadioDefault2">
      <label class="form-check-label" for="flexRadioDefault2">
        female
      </label>
    </div>
    <p class="text-danger"><?php echo validateGenderError('user_gender');
                            ?></p>
    <div class="mb-3 form-check">
      <input type="checkbox" name="user_receive" value="true" <?php echo validateInputGender("true", "user_receive"); ?> class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Receive E-Mails form us.</label>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="submit">
    <a href="./index.php" class="btn btn-secondary">cancel</a>
    <button type="reset" class="btn btn-secondary">reset</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
 <?php 
if (isset($_POST['submit'])) {
include "./logicPHP/config.php";
$name = $_POST["user_name"];
$email = $_POST["user_email"];
$gender = $_POST["user_gender"];
$receive = "false";
if (isset($_POST["user_receive"])) {
    $receive = $_POST["user_receive"];
}
if (!empty($name) && !empty($email) && isset($gender)) {
    $query = "INSERT INTO user_details(
    user_name,
    user_email,
    user_gender,
    user_receive
)
VALUES(
    '$name',
    '$email',
    '$gender',
    '$receive'
);";
    mysqli_select_db($conn, $dbname);  //use database
    $res =  mysqli_query($conn, $query);
echo "<p class='text-success  text-center '> data is inserted</p>";
}
}?>

