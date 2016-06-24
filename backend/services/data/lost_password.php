<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once __DIR__."/../../models/User.php";

/**
 * @var $model User
 */

if(Router::getParam("email")) {
    $criteria = new Criteria();
    $criteria->setCondition("email=:email");
    $criteria->addParam("email", Router::getParam("email"));

    $model = User::model()->findAll($criteria);
    $password = md5($model->id.$model->username.time());
    $model->password = md5($password);

    if($model) {
        $to = $model->email;
        $subject = "Reset lozinke";

        $message = 'Nova lozinka je: $password';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <projekt@foi.hr>' . "\r\n";

        header("Location: http://barka.foi.hr/WebDiP/2015_projekti/WebDiP2015x005/#/devices");
    }
}

?>