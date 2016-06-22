<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once(__DIR__."/../../models/Device.php");
require_once(__DIR__."/../../models/File.php");
require_once(__DIR__."/../../models/FileDeviceAssigned.php");

/**
 * @var $model ActiveRecord
 */

$deviceId = Router::getParam("id");

$data = array("success" => false);

$model = Device::model()->findOne($deviceId);

if($model) {
    if (isset($_GET['files'])) {
        $error = false;
        $files = array();

        $uploadPath = __DIR__ . '/../uploads/';

        foreach ($_FILES as $file) {
            if (move_uploaded_file($file['tmp_name'], $uploadPath . basename($file['name']))) {
                $file = $uploadPath . $file['name'];
            } else {
                $error = true;
            }
        }

        $data = $error ? $data = array("success" => false, "error" => "error on upload") : array("success" => true);
    }
}

echo json_encode($data);

?>