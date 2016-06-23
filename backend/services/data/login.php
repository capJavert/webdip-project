<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once __DIR__."/../../models/User.php";

/**
 * @var $model User
 */

$success = array(
    "success" => false
);

if(Router::getParam("user") && Router::getParam("pass")) {
    $model = User::login(Router::getParam("user"), Router::getParam("pass"));

    if($model) {
        $success = array(
            "success" => true
        );

        $model->setAuthKey();
        $model->save();

        $_SESSION['user'] = array(
			"id" => $model->id,
            "token" => $model->auth_key,
            "username" => $model->username,
            "loginTime" => Helpers::time()
        );
		
		setcookie("user", json_encode($_SESSION['user']), time() + (86400 * 7), "/");

        $user = $model;
    }
}

echo json_encode($success);

?>