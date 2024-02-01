<?php
include "./structure/header.php";
include("./function/validation.php");

?>
<h1 class="m-5">log in</h1>
<form class="m-5" action="<?php
                            $_PHP_SELF
                            ?>" method="POST">
    <div class="row mb-3">
        <label for="inputEmail1" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email_login" value="<?php
                                                                                echo validateInputName('mail_login', "login");
                                                                                ?>" id="inputEmail1">
            <p class="text-danger"><?php echo validateInputError('email_login', "login");
                                    ?></p>
        </div>

    </div>
    <div class="row mb-3">
        <label for="inputPassword1" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="email_pass" value="<?php
                                                                                    echo validateInputName('email_pass', "login");
                                                                                    ?>" id="inputPassword1">
            <p class="text-danger"><?php echo validateInputError('email_pass', "login");
                                    ?></p>
        </div>

    </div>
    <button type="submit" class="btn btn-primary mb-3" name="login">log in</button>
    <p>donot have an account?<a href="./signup.php">Register now!</a></p>
</form>
<?php


if (isset($_POST['login'])) {
    $path = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "login";
    $conn = mysqli_connect($path, $uname, $pass, $dbname);
    if (!$conn) {
        echo  "Error: Unable to connect to MySQL." . PHP_EOL;
    }
    $loginemail = $_POST["email_login"];
    $loginpassword = $_POST["email_pass"];
    if (!empty($loginemail) && !empty($loginpassword)) {
        $query = "SELECT `email_login`, `email_pass` 
        FROM person 
        WHERE email_login = '$loginemail';";
        mysqli_select_db($conn, $dbname);  //use database
        $res =  mysqli_query($conn, $query);
        $users = mysqli_fetch_assoc($res);
        if ($users != NULL) {
            if (password_verify($loginpassword, $users["email_pass"],)) {
                $cookie_value = "$loginemail";
                setcookie("user", $cookie_value, time(), "/");
                session_start();
                $_SESSION["username"] = $loginemail;
                header("location: ./index.php");
            } else {
                echo "<p class='text-danger'>please inter correct password</p>";
            }
        } else {
            echo "<p class='text-danger'>this email not exist</p>";
        }
        mysqli_close($conn);
    }
}
include "./structure/footer.php"
?>