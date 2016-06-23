<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once __DIR__."/../../models/User.php";

/**
 * @var $model User
 */

if(Router::getParam("token")) {
    $model = User::findByKey(Router::getParam("token"));

    if($model) {
        if($model->active==0) {
            $model->setAuthKey();
            $model->active = 1;
            $model->save();

            $_SESSION['user'] = array(
                "token" => $model->auth_key,
                "username" => $model->username,
                "loginTime" => Helpers::time()
            );

            $user = $model;

            header("Location: /WebDiP/2015_projekti/WebDiP2015x005/#/devices");
        }
    }
}

echo "Token je istekao ili nije ispravan.";

?>