<?php
require APP.'/src/render.php';
session_destroy();
if (isset($_COOKIE['email']) && isset($_COOKIE['passwd'])){
    setcookie("email", null, time()-3600, '/');
    setcookie("passwd", null, time()-3600, '/');
}
header("location: ?url=login");
$uname=$_SESSION['uname'] ?? ''; 