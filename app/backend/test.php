<?php
require_once("header.php");

if(!AccessControl::check(0, $user->role_id)) {
    header("Location: /prijava");
}

$criteria = new Criteria();

var_dump($user->role());

?>