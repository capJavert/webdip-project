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
        var_dump()
        if($model->active==0 && Helpers::time()<$model->date_email_expire) {
            $model->setAuthKey();
            $model->active = 1;
            $model->save();

            header("Location: /WebDiP/2015_projekti/WebDiP2015x005/#/login");
        }
    }
}

echo "Token je istekao ili nije ispravan.";

?>