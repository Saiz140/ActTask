<?php
require APP.'/src/render.php';
$uname=$_SESSION['uname'] ?? ''; 
echo render('register',['title'=>'Register '.$uname]);
