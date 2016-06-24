<?php

require_once (__DIR__."/../../models/DeviceLike.php");
require_once (__DIR__."/../../models/CategoryLike.php");
require_once(__DIR__."/../../header.php");

$saved = array("success", false);

if($user->id && Router::getParam("id") && Router::getParam("model")) {
    $criteria = new Criteria();
    $criteria->addParam("mId", Router::getParam("id"));
    $criteria->addParam("userId", $user->id);

    switch(Router::getParam("model")) {
        case "Device":
            $criteria->setCondition("device_id=:mId AND user_id=:userId");

            $model = DeviceLike::model()->findAll($criteria);
            if($model) {
                $saved = $model->delete();
            } else {
                $model = new DeviceLike();
                $model->device_id = Router::getParam("id");
                $model->user_id = $user->id;
                $saved = $model->save();
            }
            break;
        case "Category":
            $criteria->setCondition("category_id=:mId AND user_id=:userId");

            $model = CategoryLike::model()->findAll($criteria);
            if($model) {
                $saved = $model->delete();
            } else {
                $model = new CategoryLike();
                $model->category_id = Router::getParam("id");
                $model->user_id = $user->id;
                $saved = $model->save();
            }
            break;
    }
}

echo json_encode($saved);

?>