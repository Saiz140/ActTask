<?php

ini_set('display_errors','On');
session_start();
define('APP',__DIR__);
require APP.'/src/route.php';
$controller=getRoute();
require APP.'/controllers/'.$controller.'.php';

