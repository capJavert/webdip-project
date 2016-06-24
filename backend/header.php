<?php

require_once("models/User.php");
require_once("includes/Router.php");
require_once("includes/AccessControl.php");
require_once("includes/Criteria.php");
require_once("includes/Helpers.php");
require_once("includes/Service.php");

/**
 * @var User $newUser
 */

$config = include("config.php");
define("APP_ROUTE", $config['env']['basepath']);
define("SERVER_NAME", $config['db']['serverName']);
define("USERNAME", $config['db']['username']);
define("PASSWORD", $config['db']['password']);
define("DB_NAME", $config['db']['dbName']);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$user = new User();
$user->id = 0;
$user->role_id = 0;

if(isset($_SESSION['user'])) {
    $newUser = User::findByKey($_SESSION['user']['token']);

    if($newUser) {
        $user = $newUser;
    }
}

?>