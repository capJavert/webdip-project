<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__."/../models/User.php");
require_once(__DIR__."/../includes/Router.php");
require_once(__DIR__."/../includes/AccessControl.php");
require_once(__DIR__."/../includes/Criteria.php");
require_once(__DIR__."/../includes/Helpers.php");
require_once(__DIR__."/../includes/Service.php");

$data = User::model()->findAll();

?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aktivan</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $d): ?>
    <tr>
        <td><?= $d->id ?></td>
        <td><?= $d->username ?></td>
        <td><?= $d->password ?></td>
        <td><?= $d->active ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>