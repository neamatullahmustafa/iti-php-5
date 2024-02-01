<?php
include("./function/validation.php");
include "./logicPHP/displayusers.php";
include "./structure/header.php";
?>
<nav class="m-5 d-flex justify-content-between"><h2><?php
//  echo $_SESSION["username"];
?></h2><a type="button" class="btn btn-danger " href="./logout.php">logout</a></nav>
    <div class="row m-5 ">
        <h1 class="col-10">user details</h1>
        <a href="./addnewuserui.php" class="col-2"> <button type="button" class="btn btn-outline-primary">add new user</button></a>
    </div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">gender</th>
                <th scope="col">mail state</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($users); $i++) {
            ?>
                <tr>
                    <td scope="row"><?php
                                    $id = $users[$i]['user_id'];
                                    echo $id; ?>
                    </td>
                    <td><?php
                        echo $users[$i]['user_name']; ?></td>
                    <td><?php
                        echo $users[$i]['user_email']; ?></td>
                    <td><?php
                        echo $users[$i]['user_gender']; ?></td>
                    <td><?php
                        echo $users[$i]['user_receive']; ?></td>
                    <td> <a type="button" class="btn btn-primary" href="<?php echo "./showuserui.php?id=$id"
                                                                        ?>">open</a>
                        <a type="button" class="btn btn-success " href="<?php echo "./updateuser.php?id=$id"
                                                                        ?>">edit</a>
                        <a type="button" class="btn btn-danger  " href="<?php echo "./delateuser.php?id=$id"
                                                                        ?>">delete</a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>

    </table>
<?php 
include "./structure/footer.php"
?>