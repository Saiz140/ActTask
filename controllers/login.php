<?php
require APP.'/src/render.php';
$uname=$_SESSION['uname'] ?? ''; 
echo render('login',['title'=>'Login '.$uname]);
