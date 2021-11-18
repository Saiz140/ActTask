<?php
if(!isset($_SESSION['uname'])){
	header("location: ?url=login");
}

include 'src/templates/header.tpl.php';
?>

<title>Home</title>
<link rel="stylesheet" type="text/css" href="src/css/style.css">

<center>
<h1>Start managing your tasks</h1>
<img src="https://www.flaticon.es/svg/static/icons/svg/1935/1935389.svg" >
</center>

<?php
include 'src/templates/footer.tpl.php';
?>
