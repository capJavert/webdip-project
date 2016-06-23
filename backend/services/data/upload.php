<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once(__DIR__."/../../models/Device.php");
require_once(__DIR__."/../../models/File.php");
require_once(__DIR__."/../../models/FileDeviceAssigned.php");

/**
 * @var $model Device|ActiveRecord
 */

$deviceId = Router::getParam("id");

$data = array("success" => false);

$model = Device::model()->findOne($deviceId);

if($model) {
    if(isset($_FILES)) {
        $error = false;
        $files = array();

        foreach ($_FILES as $file) {
            $genericName = 'FILE'.Helpers::time();
            $extension = ".".pathinfo($file['name'],PATHINFO_EXTENSION);
            $uploadPath = __DIR__ . '/../uploads/'.$genericName.$extension;

            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                $filePath = $uploadPath . $file['name'];
                $newFile = new File();
                $newFile->added_by = 1;
                $newFile->name = $genericName;
                $newFile->original_name = $file['name'];
                $newFile->extension = $extension;
                $newFile->size = $file['size'];
                $newFile->tags = "#generic";

                $newFile->save();

                $fileAssigned = new FileDeviceAssigned();
                $fileAssigned->file_id = $newFile->id;
                $fileAssigned->device_id = $model->id;
                $fileAssigned->alt = "Slika uređaja $model->name";

                $fileAssigned->save();
            } else {
                $error = true;
            }
        }

        $data = $error ? $data = array("success" => false, "error" => "error on upload") : array("success" => true);

    }
}

echo json_encode($data);

?>