<?php
include "src/connect.php";
include "config.php";
include "src/schema.php";
require APP.'/src/render.php';
$uname=$_SESSION['uname'] ?? '';

$db =connectMysql($dsn, $dbuser, $dbpass);
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'dtn', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$task=filter_input(INPUT_POST, 'task', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$table="task";
$fields=['id','description','user','due_date'];

if(isset($id)){

    $conditions = ['user', $id];
    $Twhere = selectCondition($db,$table, $fields, $conditions);
    echo render('dashboard',['title'=>'All '.$uname, 'tsk' => $Twhere]);

}else{
    echo render('dashboard',['title'=>'All '.$uname]);
}

if($task !=null){
    deleteTask($db, $task);
    ?>
            <script>
            alert("Successfuly deleted");
            location.href="?url=dashboard";
            </script>
    <?php
}

if(isset($user) && isset($description) && isset($date)){
    
    $data = ['user' => $user,'description' => $description,'due_date' => $date];
    insertTask($db, $table, $data);
    ?>
            <script>
            alert("Successfuly inserted");
            location.href="?url=dashboard";
            </script>
    <?php
}
