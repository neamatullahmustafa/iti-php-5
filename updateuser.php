<?php
include("./function/validation.php");
include "./logicPHP/config.php";
$id = $_GET['id'];
$query = "SELECT * FROM user_details
WHERE user_id = $id";
mysqli_select_db($conn, $dbname);
$res = mysqli_query($conn, $query);
$users = mysqli_fetch_assoc($res);
$name = $users["user_name"];
$email = $users["user_email"];
$gender = $users["user_gender"];
$receive = $users["user_receive"];
mysqli_close($conn);
include "./structure/header.php";
?>
<h1 class="m-5">add new user</h1>
<form action="<?php
              $_PHP_SELF
              ?>" method="POST" class="m-5">
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">name</label>
    <input type="text" name="user_name" class="form-control" value="<?php
                                                                    if (isset($_POST["submit"])) {
                                                                      echo validateInputName('user_name',"submit");
                                                                    } else {
                                                                      echo $name;
                                                                    }
                                                                    ?>" id="exampleInputName1">
  </div>
  <p class="text-danger"><?php echo validateInputError('user_name',"submit");
                          ?></p>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="user_email" class="form-control" value="<?php if (isset($_POST["submit"])) {
                                                                        echo validateInputName('user_email',"submit");
                                                                      } else {
                                                                        echo $email;
                                                                      }
                                                                      ?>" id="exampleInputEmail1">
  </div>
  <p class="text-danger"><?php echo validateInputError('user_email',"submit");
                          ?></p>
  <label class="form-check-label" for="genderDev">gender</label>
  <div class="form-check" id="genderDev">
    <input class="form-check-input" type="radio" name="user_gender" value="male" <?php
                                                                                  if (isset($_POST["submit"])) {
                                                                                    echo validateInputGender("male", "user_gender");
                                                                                  } elseif ($gender == "male") {
                                                                                    echo "checked";
                                                                                  }
                                                                                  ?> id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">
      male
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="user_gender" value="female" <?php
                                                                                    if (isset($_POST["submit"])) {
                                                                                      echo validateInputGender("female", "user_gender");
                                                                                    } elseif ($gender == "female") {
                                                                                      echo "checked";
                                                                                    }
                                                                                    ?> id="flexRadioDefault2">
    <label class="form-check-label" for="flexRadioDefault2">
      female
    </label>
  </div>
  <p class="text-danger"><?php echo validateGenderError('user_gender');
                          ?></p>
  <div class="mb-3 form-check">
    <input type="checkbox" name="user_receive" value="true" <?php
                                                            if (isset($_POST["submit"])) {
                                                              echo validateInputGender("true", "user_gender");
                                                            } elseif ($receive == "true") {
                                                              echo "checked";
                                                            }
                                                            ?> class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Receive E-Mails form us.</label>
  </div>
  <input type="submit" class="btn btn-primary" name="submit" value="update">
  <a href="./index.php" class="btn btn-secondary">cancel</a>
  <button type="reset" class="btn btn-secondary">reset</button>
</form>
<?php
if (isset($_POST["submit"])) {
  $name = $_POST["user_name"];
  $email = $_POST["user_email"];
  $gender = $_POST["user_gender"];
  $receive = "false";
  if (isset($_POST["user_receive"])) {
    $receive = $_POST["user_receive"];
  }

  if (!empty($name) && !empty($email) && isset($gender)) {
    include "./logicPHP/config.php";
    $query = "UPDATE
   `user_details`
SET
   `user_name` = '$name',
   `user_email` = '$email',
   `user_gender` = '$gender',
   `user_receive` = '$receive'
WHERE `user_id` = $id
   ;";
    mysqli_select_db($conn, $dbname);  //use database
    $res =  mysqli_query($conn, $query);
    echo "<p class='text-success  text-center '> data is updated</p>";
    echo "<pre>";
    print_r($res);
    echo "</pre>";
  }
}

include "./structure/footer.php"
?>