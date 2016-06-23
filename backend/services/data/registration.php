<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once __DIR__."/../../models/User.php";

/**
 * @var $model User
 * @var $saved Array
 */

$model = new User();

$newModel = json_decode(Router::getParam("object"), true);

foreach($newModel as $key => $property) {
    if(is_bool($property['value'])) {
        $property['value'] = $property['value'] ? 1:0;
    }

    if($model->test($key)) {
        $model->$key = $property['value'];
    }
}

//$user->active = 1; //user active without email TODO test
$model->role_id = 1;
$model->password = md5($model->password);

$criteria = new Criteria();
$criteria->setCondition("username=:username OR email=:email");
$criteria->addParam("username", $model->username);
$criteria->addParam("email", $model->email);

if(User::model()->findAll($criteria)) {
    $saved = array("success"=>false);
} else {
    $saved = $model->save();

    if($saved['success']) {
        $user->setAuthKey();
        $user->sendEmail();
    }

}
echo json_encode($saved);

?>