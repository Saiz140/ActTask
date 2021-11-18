<?php
require APP.'/src/render.php';
$uname=$_SESSION['uname'] ?? ''; 
echo render('home',['title'=>'Welcome '.$uname]);