<?php
require_once("config.php");
require_once("models/User.php");
require_once("Criteria.php");

$criteria = new Criteria();
$criteria->condition = "id=1";
$users = User::model()->findAll($criteria);

var_dump($users);
?>