<?php
include "src/connect.php";
include "config.php";
include "src/schema.php";

$db =connectMysql($dsn, $dbuser, $dbpass);
$table='users';
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$passwd = password_hash($passwd, PASSWORD_BCRYPT, ["cost" => 4]);
$conditions=['email',$email];
$verify= selectWhereEmail($db,$conditions);
$new=empty($verify);

if($email!=null && $user!=null && $passwd!=null){
    if($new == false){
        ?>
        <script>
        alert("This user already exists.");
        location.href="?url=register";
        </script>
        <?php
    } else if ($new == true){
        $data=['email' => $email, 'uname' => $user, 'passw'=> $passwd];
        insertSchema($db, $table, $data);
        ?>
        <script>
        alert("Welcome, please login to enter");
        location.href="?url=login";
        </script>
        <?php
    }
}else{
    ?>
        <script>
        alert("Insert data to register");
        location.href="?url=register";
        </script>
    <?php
    
}



